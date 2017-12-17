<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/12/17
 * Time: 7:49 PM
 */

namespace App\Http\Controllers;


use App\Gateways\EntitiesGateway;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use App\Helpers\LayoutHelper;

class AddEntityController extends Controller
{

    protected $entitiesGateway;

    public function __construct(EntitiesGateway $entitiesGateway)
    {
        $this->entitiesGateway = $entitiesGateway;
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        LayoutHelper::flushAllMessages($request);

        return view('add_entity');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        LayoutHelper::flushAllMessages($request);

        $file = $request->file('thumbnail');
        $path = Storage::disk('local')->getAdapter()->getPathPrefix();

        $imageName = md5($request->get('thumbnail') . time()) . '.' . $file->getClientOriginalExtension();
        $file->move($path . 'image/tmp', $imageName);


        $manager  = new ImageManager(array('driver' => 'gd'));
        $contents = storage_path('app/public/image/tmp/' . $imageName);

        $manager->make($contents)->resize(100, 100)->save(storage_path('app/public/image/entity/' . $imageName));

        $result = $this->entitiesGateway->addEntity($user, $request->get('title'), $request->get('description'), $imageName, $request->get('url'));

        return redirect()->route('showEntity', ['id' => $result->getBody()->getContents()]);
    }

    public function show(Request $request, $id)
    {
        LayoutHelper::flushAllMessages($request);
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
