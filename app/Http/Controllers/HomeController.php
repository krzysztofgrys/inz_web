<?php

namespace App\Http\Controllers;

use App\Gateways\CommentsGateway;
use App\Gateways\RateGateway;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Gateways\EntitiesGateway;
use App\Helpers\LayoutHelper;

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
        $entities =json_decode($this->entitiesGateway->getEntities()->getBody()->getContents());

        if(isset($entities->error)){
            $data = [];
            $request->session()->flash('info', ['title' => 'Brak wpisów', 'content' => '<a href=/add> Kliknij tutaj, aby dodać pierwszy wpis!</a>']);

        }else{
            $data = $entities->data;
        }

        return view('home', ['datas' => $data]);
    }

    public function show(Request $request, $id)
    {

        $result   = json_decode($this->entitiesGateway->getEntity($id)->getBody()->getContents());
        $comments = json_decode($this->commentsGateway->getComments($id)->getBody()->getContents());

        if(isset($result->error)){
            abort(404, 'Brak wpisu o danym ID');
        }

        return view('entity',
            [
                'data'           => $result->data[0],
                'comments'       => $comments->data,
                'comments_count' => count($comments)
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
}
