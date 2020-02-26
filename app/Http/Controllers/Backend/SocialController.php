<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;
use Response;
use Validator;
use Session;
use File;
use Route;
use App\Social;
use App\Helper\Helper;


class SocialController extends Controller
{
    public function __construct(Request $request, Helper $helper)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->helper = $helper;
    }
    public function index()
    {
        $socials=Social::orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(10);
        $counts=Social::count();
        return view('backend.social.index',compact('socials','counts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $main_store = new Social;
        $main_store->facebook = Input::get('facebook');
        $main_store->linkedin = Input::get('linkedin');
        $main_store->twitter = Input::get('twitter');
        $main_store->google = Input::get('google');
        $main_store->instagram = Input::get('instagram');
        $main_store->created_by = Auth::user()->id;
        if($main_store->save()){
            $this->request->session()->flash('alert-success', 'Data save successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be add!!');
        }
        return back()->withInput();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socials = Social::where('id', $id)->get();
        return view('backend.social.edit', compact('socials'));
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
       
        $main_store=Social::find($id);
        $main_store->facebook = Input::get('facebook');
        $main_store->linkedin = Input::get('linkedin');
        $main_store->twitter = Input::get('twitter');
        $main_store->google = Input::get('google');
        $main_store->instagram = Input::get('instagram');
        if($main_store->update()){
            $this->request->session()->flash('alert-success', 'Data Updated successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be updated  !!');
        }
        return redirect('/home/social');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $social=Social::find($id);
       if($social->delete()){
         $this->request->session()->flash('alert-success', 'Data delete successfully!!');
       }else{
         $this->request->session()->flash('alert-waring', 'Data could not be deleted!!');
       }
       return back()->withInput();
        
    }
    public function isactive(Request $request,$id)
    {
        $get_is_active = Social::where('id',$id)->value('is_active');
        $isactive = Social::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            $this->request->session()->flash('alert-success', 'Data  published!!');

        }
        else {
            $isactive->is_active = 0;
            $this->request->session()->flash('alert-danger', 'Data could not be published!!');
        }
        $isactive->update();
        return back()->withInput();
    }
}
