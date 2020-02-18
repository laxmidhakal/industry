<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Auth;
use Redirect;
use Response;
use Validator;
use Session;
use File;
use Route;
use App\Setting;
use App\Helper\Helper;

class SettingController extends Controller
{
    public function __construct(Request $request, Helper $helper)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->helper = $helper;
    }
    public function index()
    {
        $settings=Setting::orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(10);
        return view('backend.setting.index',compact('settings'));
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
        $rules = array(
            'address' => 'required',
            'phone' => 'required|unique:settings',
            'email' => 'required|email|unique:settings',
            'lat' => 'required',
            'long' => 'required',
            'image' => 'required|mimes:png|max:1024',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/setting')
        ->withErrors($validator)
        ->withInput();
        }
        $main_store = new Setting;
        $mainaddress = Input::get('address');
        $main_store->address = Str::ucfirst($mainaddress);
        $main_store->phone = Input::get('phone');
        $main_store->email = Input::get('email');
        $main_store->lat = Input::get('lat');
        $main_store->long = Input::get('long');
        $image = Input::file('image');
        if($image != ""){
            $destinationPath = 'images/setting/'; // upload path
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $fileName = md5(mt_rand()).'.'.$extension; // renameing image
            $image->move($destinationPath, $fileName); /*move file on destination*/
            $file_path = $destinationPath.'/'.$fileName;
            $main_store->image_enc = $fileName;
            $main_store->image = $image->getClientOriginalName();
        }
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
}
