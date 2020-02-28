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
use App\Contact;

class ContactController extends Controller
{
    public function __construct(Request $request, Helper $helper)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function index()
    {
        $contacts=Contact::orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(10);
        return view('backend.contact.index',compact('contacts'));
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
        
        if(request()->ajax())
        {
            $rules = array(
                'name' => 'required|unique:contacts',
                'email' => 'required|unique:contacts',
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
            $main_store->name = Input::get('name');
            $main_store->email = Input::get('email');
            $main_store->subject = Input::get('subject');
            $main_store->message = Input::get('message');
            $main_store->save();
            return response()->json(['success' => 'Data Added']);
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
        if($contact->delete()){
            $this->request->session()->flash('alert-success', 'Data deleted successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be deleted!!');
        }
        return back()->withInput();
    }
}
