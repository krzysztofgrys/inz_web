<?php

namespace App\Http\Controllers;

use App\Gateways\CommentsGateway;
use App\Gateways\RateGateway;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Gateways\EntitiesGateway;

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

        $entities = $this->entitiesGateway->getEntities();

        return view('home', ['datas' => json_decode($entities->getBody()->getContents())->data]);
    }

    public function show($id)
    {
        $result   = $this->entitiesGateway->getEntity($id);
        $comments = $this->commentsGateway->getComments($id);


        return view('entity',
            [
                'data'     => json_decode($result->getBody()->getContents())->data[0],
                'comments' => json_decode($comments->getBody()->getContents())->data
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
        $user    = Auth::user();
        $comment = $request->get('comment');
        $result  = $this->commentsGateway->addComment($user, $id, $comment);

        return redirect()->route('showEntity', ['id' => $result->getBody()->getContents()]);
    }

    public function delete(Request $request, $id)
    {
        $user = Auth::user();

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
