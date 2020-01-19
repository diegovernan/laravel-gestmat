<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('users.security', compact('user'));
    }
}
