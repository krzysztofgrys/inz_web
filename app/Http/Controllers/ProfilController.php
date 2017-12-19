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

        if ($request->get('password') != $request->get('c_password')) {
            $request->session()->flash('error', 'Hasła nie są takie same.');

            return redirect()->route('showProfile', $id);
        }

        if ($file = $request->file('avatar')) {
            $file = $request->file('avatar');
            $path = Storage::disk('local')->getAdapter()->getPathPrefix();

            $imageName = md5($request->get('avatar') . time()) . '.' . $file->getClientOriginalExtension();
            $file->move($path . 'image/tmp', $imageName);


            $manager  = new ImageManager(array('driver' => 'gd'));
            $contents = storage_path('app/public/image/tmp/' . $imageName);

            $manager->make($contents)->resize(100, 100)->save(storage_path('app/public/image/avatars/' . $imageName));
        } else {
            $imageName = '';
        }


        $result = $client->put(env('API') . '/v1/users/' . $id, [
            'form_params' => [
                'city'        => $request->get('city'),
                'description' => $request->get('description'),
                'age'         => $request->get('age'),
                'fullname'    => $request->get('fullname'),
                'password'    => $request->get('password'),
                'c_password'  => $request->get('c_password'),
                'avatar'      => $imageName
            ]
        ]);


        $result = $result->getBody()->getContents();

        $request->session()->flash('success', 'Pomyślnie zaktualizowano dane.');

        return redirect()->route('showProfile', $result);
    }
}
