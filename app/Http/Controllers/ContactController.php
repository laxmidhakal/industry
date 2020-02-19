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

class ContactController extends Controller
{ 
    public function index()
    {
        $contacts=Contact::orderBy('created_at','DESC')->get();
        $settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
        $about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
        $product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
        $socials = Social::orderBy('created_at','DESC')->get()->take(1);
        $page_title = "Contact ";
        return view('contact',compact('settings','product_menu','socials','about_details','contacts','page_title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts=Contact::orderBy('created_at','DESC')->get();
        return view('backend.contact.index',compact('contacts'));        
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
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        );
        $notification = array(
            'message' => 'I am a danger!', 
            'alert-type' => 'success'
        );
        $validator = Validator::make(Input::all(), $rules,$notification);
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
        if ($names=='bini') {
            echo "success";
             $notification = array(
            'message' => 'Please enter correct format of email!', 
            'alert-type' => 'error'
        );
        }else{
             echo "error";
           
        }
       $main_store->save();
       
        return back()->with( $notification);      

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
