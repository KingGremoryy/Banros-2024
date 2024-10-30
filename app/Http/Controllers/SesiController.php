<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesiController extends Controller
{
    function index ()
    {
        return view('admin');
    }
    function admin ()
    {
        return view('admin');
    }
    function manager ()
    {
        return view('admin');
    }
}
