<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $inputFields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $inputFields['email'], 'password' => $inputFields['password']])) {
            $request->session()->regenerate();
            return redirect('index');
        }

        return redirect('/');
    }
    public function Registeration(Request $request ){
        // validate inputs value
        $inputFields= $request ->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);
        // hashing pass
        $inputFields['password'] = bcrypt($inputFields['password']);
        //add user to db
        $user = User::create($inputFields);

         return redirect('/');
    }
}
