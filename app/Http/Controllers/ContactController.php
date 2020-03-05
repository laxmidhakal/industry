<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Redirect;
use Response;
use App\About;
use App\Product;
use App\Setting;
use App\Contact;
use App\Social;
use App\Company;

class ContactController extends Controller
{ 
    public function index()
    {
        $contacts=Contact::orderBy('created_at','DESC')->get();
        $settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
        $about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
        $product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
        $socials = Social::orderBy('created_at','DESC')->get()->take(1);
        $page_title = "Contact ";
        $company_menu = Company::where('is_active', true)->orderBy('sort_id','DESC')->get();
        return view('contact',compact('settings','product_menu','socials','about_details','contacts','page_title','company_menu'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     if(request()->ajax())
     {
      $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
        return redirect('/contact')
        ->withErrors($validator)
        ->withInput();
      }
      $main_store = new Contact;
      $names = Input::get('name');
      $main_store->name = Str::ucfirst($names);
      $main_store->email = Input::get('email');
      $main_store->subject = Input::get('subject');
      $main_store->message = Input::get('message');
      if($main_store->save()){
      $response = array(
      'status' => 'success',
      'msg' => 'Successfully Changed',
      );
      }else{
      $response = array(
      'status' => 'failure',
      'msg' => 'Change Unsuccessful',
      );
      }
      return Response::json($main_store);
     

    }
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
        
        $contact=Contact::find($id);
        $contact->delete();
        return redirect()->route('homecontact');
       
    }
   
}
