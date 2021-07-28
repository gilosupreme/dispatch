<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispatcherRedirectController extends Controller
{
    public function __construct()
    {
        $this->middleware('dispatcher');
    }

    public function index()
    {
        return view('dispatcher.index');
    }
}
