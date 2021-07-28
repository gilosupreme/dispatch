<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required | string',
        ]);

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember_me = $request->remember ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

            $user = User::where('email', $request->email)->first();

            if ($user->is_supervisor()) {
                return redirect()->route('supervisor.index');
            } elseif ($user->is_dispatcher()) {
                return redirect()->route('dispatcher.index');
            } else {
                return redirect()->route('home');
            }
        } else {
            Session::flash('invalid.login', 'Your credentials <strong>do NOT MATCH</strong> our records. Try again.');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
            return redirect()->back();
        }
    }
}
