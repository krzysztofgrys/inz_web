<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/12/17
 * Time: 7:49 PM
 */

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddEntityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_entity');
    }

    public function store(Request $request)
    {

        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);


        $thumbnailName = md5($request->get('thumbnail') . time());
        $result        = $client->post(env('API') . '/v1/entity', [
            'form_params' => [
                'title'         => $request->get('title'),
                'description'   => $request->get('description'),
                'thumbnail'         => $thumbnailName,
                'url'           => $request->get('url'),
                'own_input'     => $request->get('own_input'),
                'selected_type' => $request->get('selected_type')

            ]
        ]);

        return redirect()->route('showEntity', ['id' => $result->getBody()->getContents()]);
    }

    public function show($id)
    {
        $user   = Auth::user();
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/entity/' . $id);

        return view('entity', ['datas' => json_decode($result->getBody()->getContents())->data]);
    }
}
