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
use App\Product;
use App\Helper\Helper;

class ProductController extends Controller
{
    public function __construct(Request $request, Helper $helper)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->helper = $helper;
    }
    public function index()
    {
        $products=Product::orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(10);
        return view('backend.product.index',compact('products'));
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
            'title' => 'required|unique:products',
           
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/product')
        ->withErrors($validator)
        ->withInput();
        }
        $main_store = new Product;
        $main_store->title = Input::get('title');
        $main_store->slug = $this->helper->slug_converter($main_store->title);
        $main_store->created_by = Auth::user()->id;
        if($main_store->save()){
            $this->request->session()->flash('alert-success', 'Data save successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be add!!');
        }
        //var_dump($name); die();

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
