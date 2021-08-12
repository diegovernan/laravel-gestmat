<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SecurityRequest;

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

    public function update(SecurityRequest $request, User $user)
    {
        if (!(Hash::check($request->old_password, auth()->user()->password))) {
            return redirect()->back()->withErrors('A senha atual está incorreta. Por favor, tente novamente.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Senha atualizada!');
    }
}
