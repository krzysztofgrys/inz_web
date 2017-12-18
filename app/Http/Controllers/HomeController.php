<?php

namespace App\Http\Controllers;

use App\Gateways\CommentsGateway;
use App\Gateways\RateGateway;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Gateways\EntitiesGateway;
use App\Helpers\LayoutHelper;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    protected $entitiesGateway;
    protected $commentsGateway;
    protected $rateGateway;

    public function __construct(EntitiesGateway $entitiesGateway, CommentsGateway $commentsGateway, RateGateway $rateGateway)
    {
        $this->entitiesGateway = $entitiesGateway;
        $this->commentsGateway = $commentsGateway;
        $this->rateGateway     = $rateGateway;
        $this->middleware('auth', ['only' => ['rate']]);

    }

    public function index(Request $request)
    {
        $entities = json_decode($this->entitiesGateway->getEntities()->getBody()->getContents());

        if (isset($entities->error)) {
            $data = [];
            $request->session()->flash('info', ['title' => 'Brak wpisów', 'content' => '<a href=/add> Kliknij tutaj, aby dodać pierwszy wpis!</a>']);

        } else {
            $data = $entities->data;
        }

        return view('home', ['datas' => $data]);
    }

    public function show(Request $request, $id)
    {
        $result   = json_decode($this->entitiesGateway->getEntity($id)->getBody()->getContents());
        $comments = json_decode($this->commentsGateway->getComments($id)->getBody()->getContents());

        if (isset($result->error)) {
            abort(404, 'Brak wpisu o danym ID');
        }

        return view('entity',
            [
                'data'           => $result->data,
                'comments'       => $comments->data,
                'comments_count' => count($comments->data)
            ]
        );
    }

    public function rate($id)
    {

        $user   = Auth::user();
        $result = $this->rateGateway->rateEntity($user, $id);

        return $result->getBody()->getContents();
    }


    public function addComment(Request $request, $id)
    {
        LayoutHelper::flushAllMessages($request);

        $user    = Auth::user();
        $comment = $request->get('comment');
        $result  = $this->commentsGateway->addComment($user, $id, $comment);

        return redirect()->route('showEntity', ['id' => $result->getBody()->getContents()]);
    }

    public function delete(Request $request, $id)
    {
        $user = Auth::user();
        LayoutHelper::flushAllMessages($request);

        $result = $this->entitiesGateway->deleteEntity($user, $id);
        $result = $result->getBody()->getContents();

        if ($result == 'ok') {
            $request->session()->flash('success', 'Usunięto');
        } else {
            $request->session()->flash('error', 'Blad');
        }

        return redirect()->route('home');
    }

    public function editEntity($id)
    {

        $result = json_decode($this->entitiesGateway->getEntity($id)->getBody()->getContents());

        if (isset($result->error)) {
            abort(404, 'Brak wpisu o danym ID');
        }

        return view('edit_entity', ['data' => $result->data]);
    }

    public function saveEditedEntity(Request $request, $id)
    {

        $file      = $request->file('thumbnail');
        $user      = Auth::user();
        $imageName = '';

        if ($file) {
            $path = Storage::disk('local')->getAdapter()->getPathPrefix();

            $imageName = md5($request->get('thumbnail') . time()) . '.' . $file->getClientOriginalExtension();
            $file->move($path . 'image/tmp', $imageName);


            $manager  = new ImageManager(array('driver' => 'gd'));
            $contents = storage_path('app/public/image/tmp/' . $imageName);

            $manager->make($contents)->resize(100, 100)->save(storage_path('app/public/image/entity/' . $imageName));
        }

        $result = $this->entitiesGateway->editEntity($id, $user, $request->get('title'), $request->get('description'), $imageName, $request->get('url'));
        $request->session()->flash('success', 'Pomyślnie zaktualizowano dane.');

        return redirect()->route('showEntity', ['id' => $id]);

    }
}
