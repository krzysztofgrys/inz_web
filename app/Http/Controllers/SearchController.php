<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:24 PM
 */

namespace App\Http\Controllers;


class SearchController extends Controller
{

    public function __construct()
    {

    }

    public function index(){

        return view('search');
    }
}