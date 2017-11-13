<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:25 PM
 */

namespace App\Http\Controllers;


class TopController extends Controller
{

    public function __construct()
    {

    }

    public function index(){

        return view('top');
    }
}