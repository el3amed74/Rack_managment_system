<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
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
            $user = auth()->user();
            if ($user->role_id === 'admin') {
                // return view('index.hotels');
                return redirect()->route('hotels.index');
            } else {
                return redirect("/hotels/{$user->hotel_id}/buildings");
            }

        } else {
            return back()->withErrors([
                'login_error' => 'Invalid email or password.',
            ])->withInput();
            // return redirect('/');
        }

    }

    public function logout() {
        auth()->logout();
        // return view('login');
        return redirect()->route('login');
    }

    public function Registeration(Request $request)
    {
        // validate inputs value
        $inputFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);
        // hashing pass
        $inputFields['password'] = bcrypt($inputFields['password']);
        //add user to db
        $user = User::create($inputFields);
        return back()->withErrors([
            'usercreated' => 'user created successfully!!!',
        ])->withInput();
        // return redirect()->route('adduser');
        
    }
}
