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
    $settings=Setting::orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
    return view('backend.setting.index',compact('settings'));
  }
  public function create()
  {
      
  }
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
  public function edit($id)
  {
    $settings = Setting::where('id', $id)->get();
    return view('backend.setting.edit', compact('settings'));
  } 
  public function update(Request $request, $id)
  {
    $rules = array(
      'address' => 'required',
      'phone' => 'required',
      'email' => 'required',
      'lat' => 'required',
      'long' => 'required',
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }
    $main_store=Setting::find($id);
    $mainaddress = Input::get('address');
    $main_store->address = Str::ucfirst($mainaddress);
    $main_store->phone = Input::get('phone');
    $main_store->email = Input::get('email');
    $main_store->lat = Input::get('lat');
    $main_store->long = Input::get('long');
    $image = Input::file('image');
    if($image != ""){
     $rules = array(
      'image' => 'required|mimes:png|max:1024',
     );
     $validator = Validator::make(Input::all(), $rules);
     if ($validator->fails()) {
      return redirect('/home/setting')
      ->withErrors($validator)
      ->withInput();
    }
    $destinationPath = 'images/setting/'; // upload path
    $oldFilename=$destinationPath.$main_store->image_enc;
    if(File::exists($oldFilename)) {
      File::delete($oldFilename);
    }
    $extension = $image->getClientOriginalExtension(); // getting image extension
    $fileName = md5(mt_rand()).'.'.$extension; // renameing image
    $image->move($destinationPath, $fileName); /*move file on destination*/
    $file_path = $destinationPath.'/'.$fileName;
    $main_store->image_enc = $fileName;
    $main_store->image = $image->getClientOriginalName();
    }
    if($main_store->update()){
      $this->request->session()->flash('alert-success', 'Data Updated successfully!!');
    }else{
      $this->request->session()->flash('alert-waring', 'Data could not be updated  !!');
    }
    return redirect('/home/setting');
  }
  public function destroy($id)
  {
    $setting=Setting::find($id);
    $destinationPath = 'images/setting/'; // upload path
    $oldFilename=$destinationPath.$setting->image_enc;
    if(File::exists($oldFilename)) {
      File::delete($oldFilename);
    }
    if($setting->delete()){
      $this->request->session()->flash('alert-success', 'Data delete successfully!!');
    }else{
      $this->request->session()->flash('alert-waring', 'Data could not be deleted!!');
    }
    return back()->withInput();
  }
  public function isactive(Request $request,$id)
  {
    $get_is_active = Setting::where('id',$id)->value('is_active');
    $isactive = Setting::find($id);
    if($get_is_active == 0){
      $isactive->is_active = 1;
    }
    else {
      $isactive->is_active = 0;
    }
    $isactive->update();
    return back()->withInput();
  }
}
