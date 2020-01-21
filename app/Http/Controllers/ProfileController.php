<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('users.profile', compact('user'));
    }

    public function update(ProfileRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado!');
    }
}
