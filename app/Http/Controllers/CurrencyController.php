<?php

namespace App\Http\Controllers;

use App\Gateways\CommentsGateway;
use App\Gateways\CurrencyGateway;
use App\Gateways\RateGateway;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Gateways\EntitiesGateway;

class CurrencyController extends Controller
{
    protected $currencyGateway;

    public function __construct(CurrencyGateway $currencyGateway)
    {
        $this->currencyGateway = $currencyGateway;
    }

    public function index(Request $request)
    {

        $convert = $request->get('convert', 'USD');

        $currency = $this->currencyGateway->getCurrencies($convert);

        return view('currency', ['datas' => json_decode($currency->getBody()->getContents())]);
    }


}
