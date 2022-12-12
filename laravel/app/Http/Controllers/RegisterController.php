<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller {
    public function register(RegisterRequest $request) {

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return redirect()->route('home')->with('success', 'Ваш аккаунт был успешно зарегестрирован');
    }

    public function allData() {
        $users = new User();
        return view('messages', ['data' => $users->orderBy('id', 'desc')->get()]);
    }
}
