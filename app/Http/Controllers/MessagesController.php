<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:23 PM
 */

namespace App\Http\Controllers;


class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(){

        return view('messages');
    }
}