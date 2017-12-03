<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:24 PM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user   = Auth::user();
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        return view('my');
    }

    public function show($id)
    {
        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/users/' . $id);
        $result = json_decode($result->getBody()->getContents());


//        $image->make('public/image/avatars/default.png');

        $contents = Storage::get('/image/avatars/default.png');

        $manager = new ImageManager(array('driver' => 'gd'));


        $image = $manager->make($contents)->resize(300, 200);


        return view('my', [
            'user'         => $result->user,
            'userEntities' => $result->user_entities,
            'image'        => $image
        ]);
    }

    public function edit($id, Request $request)
    {

        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/users/' . $id);

        $result = json_decode($result->getBody()->getContents());

        return view('editProfile', [
            'user' => $result->user
        ]);
    }


    public function editProfile(Request $request, $id)
    {

        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->put(env('API') . '/v1/users/' . $id, [
            'form_params' => [
                'city'        => $request->get('city'),
                'description' => $request->get('description'),
                'fullname'    => $request->get('fullname')
            ]
        ]);


        $result = $result->getBody()->getContents();

        $request->session()->flash('success', 'Pomyślnie zaktualizowano dane.');

        return redirect()->route('showProfile', $result);
    }
}
