<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index(){
        $title = 'Welcome to ShareU!';
        //return View('pages.index',compact('title'));
        return View('pages.index')->with('title',$title);
    }

    public function about(){
        $title = 'About Page!';
        //return View('pages.index',compact('title'));
        return View('pages.about')->with('title',$title);
    }

    public function services(){
        $data=array(
            'title'=>'Services Page'
            ,'services'=>['Web Design','Programming','Database']
        );
        return View('pages.services')->with($data);
    }
}
