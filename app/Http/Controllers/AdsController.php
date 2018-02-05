<?php

namespace App\Http\Controllers;
use App\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads= Ads::where('status', 'active')->orderBy('created_at','desc')->paginate(4);
       return View('ads.index')->with('ads',$ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isRegularUser = auth()->user()->hasRole('Regular');
        if($isRegularUser)
        {
            $countAds = Ads::where('user_id', auth()->user()->id)->count();
            if($countAds>=3)
            {
                return redirect('/ads')->with('error','You can post upto 3 ads.');
            }
        }
        


        $this->validate($request,[
            'title'=>'required'
        ]);

        $add=new Ads;
        $add->title=$request->input('title');
        if($isRegularUser)
            $add->status='inactive';
        else
            $add->status='active';
        $add->user_id= auth()->user()->id;
        $add->save();

        return redirect('/ads')->with('success','Add created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad=Ads::find($id);
        return View('ads.show')->with('ad',$ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function approvals()
    {
         $ads= Ads::where('status', 'inactive')->orderBy('created_at','asc')->paginate(4);
        return View('ads.approvals')->with('ads',$ads);
    }
    public function approve($id)
    {
        $ad=Ads::find($id);
        $ad->status='active';
        $ad->save();

        return redirect('/ads/approvals')->with('success','Ad approved');
    }
    public function reject($id)
    {
        $ad=Ads::find($id);
        $ad->delete();

        return redirect('/ads/approvals')->with('success','Ad rejected');
    }
}
