<?php

namespace App\Http\Controllers;
use App\Ads;
use App\Category;
use Illuminate\Http\Request;
use Validator;

class AdsController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth',['except' =>['index','show']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Ads::all();
        return response()->json($ads);
    //     $categoryList = Category::pluck('name','id');
    //     $ads= Ads::where('status', 'active')->orderBy('created_at','desc')->paginate(4);
    //    return View('ads.index',compact('ads','categoryList'));
    }
    public function search(Request $request)
    {
        $categoryList = Category::pluck('name','id');
        $cat_id = $request->input('cat_id');
        $ads= Ads::where('status', 'active')
        ->where('cat_id', $cat_id)
        ->orderBy('created_at','desc')->paginate(4);
       return View('ads.index',compact('ads','categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = Category::pluck('name','id');
        $selected = 1; //let it is the id of Bangladesh(my country) :)
        return View('ads.create',compact('categoryList','selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required'
        ]);

        if($validator->fails()){
            $response=array('response'=>$validator->messages(),
                            'success' =>false                       
            );
            return $response;
        }
        else{

            $add=new Ads;
            $add->title=$request->input('title');
            $add->description=$request->input('description');
            $add->country=$request->input('country');
            $add->city=$request->input('city');
            $add->area=$request->input('area');
            $add->related_area=$request->input('related_area');
            $add->street_address=$request->input('street_address');
            $add->contact_no=$request->input('contact_no');
            $add->price_per_day=$request->input('price_per_day');
            $add->cat_id=$request->input('cat_id');
            
            $add->status=$request->input('status');;
            
            $add->user_id=$request->input('user_id');
            $add->save();

            return response()->json($add);
        }

        // $isRegularUser = auth()->user()->hasRole('Regular');
        // if($isRegularUser)
        // {
        //     $countAds = Ads::where('user_id', auth()->user()->id)->count();
        //     if($countAds>=3)
        //     {
        //         return redirect('/ads/myads')->with('error','You can post upto 3 ads.');
        //     }
        // }
        


        // $this->validate($request,[
        //     'title'=>'required'
        // ]);

        // $add=new Ads;
        // $add->title=$request->input('title');
        // $add->cat_id=$request->input('cat_id');
        // if($isRegularUser)
        //     $add->status='inactive';
        // else
        //     $add->status='active';
        // $add->user_id= auth()->user()->id;
        // $add->save();

        // return redirect('/ads/myads')->with('success','Add created');
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
        return response()->json($ad);
       // return View('ads.show')->with('ad',$ad);
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
        $ad=Ads::find($id);
        $ad->delete();

        $response=array('response'=>'Item deleted',
        'success' =>true                           
        );
        return $response;

    //    return redirect('/ads/myads')->with('success','Ad deleted');
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
    public function myads()
    {
        $ads= Ads:: where('user_id', auth()->user()->id)
            ->orderBy('created_at','desc')
            ->paginate(6);
        return View('ads.myads')->with('ads',$ads);
    }
}
