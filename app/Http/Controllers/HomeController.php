<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('visitor.index');
    }

    public function showQueues()
    {
        return view('visitor.queue');
    }
}
