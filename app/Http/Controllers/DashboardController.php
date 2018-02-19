<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index')->with('user',auth()->user());
        // $user_id=auth()->user()->id;
        // $user=User::find($user_id);
        // return view('dashboard')->with('posts',$user->posts);
    }
    public function test()
    {
        $roles = auth()->user()->roles()->pluck('name');
        return view('test')->with('roles',$roles);
    }
   
}
