<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:25 PM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Helpers\LayoutHelper;


class TopController extends Controller
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function index(Request $request)
    {
        LayoutHelper::flushAllMessages($request);

        $result = $this->client->get(env('API') . '/v1/top');

        $result = json_decode($result->getBody()->getContents())->data;

        if (empty($result)) {
            $request->session()->flash('warning', ['title' => 'Brak danych', 'content' => 'Zmień zakres czasu i spróbuj ponownie.']);
        } else {
            $request->session()->forget('warning');
        }

        return view('top', ['datas' => $result]);
    }


    public function show(Request $request, $time)
    {
        LayoutHelper::flushAllMessages($request);

        $result = $this->client->get(env('API') . '/v1/top/' . $time);
        $result = json_decode($result->getBody()->getContents())->data;

        if (empty($result)) {
            $request->session()->flash('warning', ['title' => 'Brak danych', 'content' => 'Zmień zakres czasu i spróbuj ponownie.']);
        }

        return view('top', ['datas' => $result]);
    }
}