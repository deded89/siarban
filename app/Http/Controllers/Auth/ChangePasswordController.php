<?php

namespace App\Http\Controllers\Auth;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;



class ChangePasswordController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.changePassword');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => 'required', new MatchOldPassword,
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'same:new_password',
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('login');
    }
}
