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
use App\Company_has_contact;
use App\Company;
use App\Helper\Helper;

class CompanyContactController extends Controller
{
    public function __construct(Request $request, Helper $helper)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->helper = $helper;
    }
    public function index($slug)
    {
        $company_id = Company::where('slug',$slug)->value('id'); 
        $companydetails = Company_has_contact::where('company_id',$company_id)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(10);
        return view('backend.company_contact.index',compact('companydetails','company_id'));
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
            'video' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/company')
        ->withErrors($validator)
        ->withInput();
        }
         $main_store = new Company_has_contact;
        $product= new Company;
        $main_store->company_id = Input::get('company_id'); 
        $mainaddress = Input::get('address');
        $main_store->address = Str::ucfirst($mainaddress);
        $main_store->phone = Input::get('phone');
        $main_store->email = Input::get('email'); 
        $main_store->video = Input::get('video');
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
    public function isSort()
    {
        $id = Input::get('id');
        $value = Input::get('value');
        $sort_ids =  Company_has_contact::find($id);
        $sort_ids->sort_id = $value;
        if($sort_ids->save()){
          $response = array(
            'status' => 'success',
            'msg' => 'Successfully change',
          );
        }else{
          $response = array(
            'status' => 'failure',
            'msg' => 'Sorry the data could not be change',
          );
        }
        return Response::json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companycontacts = Company_has_contact::where('id', $id)->get();
        $companies = Company::where('id', $id)->get();
        return view('backend.company_contact.edit', compact('companycontacts','companies'));
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
        $rules = array(
            'address' => 'required',
            'phone' => 'required|unique:settings',
            'email' => 'required|email|unique:settings',
            'video' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
        }
        $company_id = Company_has_contact::where('id',$id)->value('company_id');
        $main_store=Company_has_contact::find($id);
        $main_store->company_id = $company_id; 
        $mainaddress = Input::get('address');
        $main_store->address = Str::ucfirst($mainaddress);
        $main_store->phone = Input::get('phone');
        $main_store->email = Input::get('email'); 
        $main_store->video = Input::get('video');
        $main_store->created_by = Auth::user()->id;
        if($main_store->save()){
            $this->request->session()->flash('alert-success', 'Data Updated successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be add!!');
        }
        return redirect()->route('companyDetail', $main_store->getCompany->slug);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companycontact=Company_has_contact::find($id);
        if($companycontact->delete()){
            $this->request->session()->flash('alert-success', 'Data deleted successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be deleted!!');
        }
        return back()->withInput();
    }
    public function isactive(Request $request,$id)
    {
        $get_is_active = Company_has_contact::where('id',$id)->value('is_active');
        $isactive = Company_has_contact::find($id);
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
