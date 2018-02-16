<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    public function add(Request $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return response()->json($user);
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        
    }
}
