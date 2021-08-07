<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SupervisorRedirectController extends Controller
{
    public function __construct()
    {
        $this->middleware('supervisor');
    }

    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        return view('supervisor.index', compact('users', 'user'));
    }
}
