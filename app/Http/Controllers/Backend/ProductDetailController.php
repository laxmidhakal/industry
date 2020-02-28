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
use App\Product_has_detail;
use App\Product;
use App\Helper\Helper;

class ProductDetailController extends Controller
{
    public function __construct(Request $request, Helper $helper)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->helper = $helper;
    }
    public function index($slug)
    {
        $product_id = Product::where('slug',$slug)->value('id'); 
        $productdetails = Product_has_detail::where('product_id',$product_id)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(10);
        return view('backend.product_detail.index',compact('productdetails','product_id'));
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
            'title' => 'required|unique:product_has_details',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg|max:1024',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/product')
        ->withErrors($validator)
        ->withInput();
        }
        $main_store = new Product_has_detail;
        $product= new Product;
        $main_store->product_id = Input::get('product_id');        
        $main_store->title = Input::get('title');
        $main_store->slug = $this->helper->slug_converter($main_store->title);
        $image = Input::file('image');
        if($image != ""){
            $destinationPath = 'images/productdetail/'; // upload path
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $fileName = md5(mt_rand()).'.'.$extension; // renameing image
            $image->move($destinationPath, $fileName); /*move file on destination*/
            $file_path = $destinationPath.'/'.$fileName;
            $main_store->image_enc = $fileName;
            $main_store->image = $image->getClientOriginalName();
        }
        $main_store->description = Input::get('description');
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
       $sort_ids =  Product_has_detail::find($id);
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
        $productdetails = Product_has_detail::where('id', $id)->get();
        $products = Product::where('id', $id)->get();
        return view('backend.product_detail.edit', compact('productdetails','products'));
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
            'title' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect()->route('productDetail', $main_store->getProduct->slug)
        ->withErrors($validator)
        ->withInput();
        }
        $product_id = Product_has_detail::where('id',$id)->value('product_id');
        $main_store=Product_has_detail::find($id);
        $main_store->product_id = $product_id;
        $main_store->title = Input::get('title');
        $main_store->slug = $this->helper->slug_converter($main_store->title);
        $image = Input::file('image');
        if($image != ""){
             $rules = array(
                'image' => 'required|mimes:jpeg,jpg|max:1024',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
            return redirect()->route('productDetail', $main_store->getProduct->slug)
            ->withErrors($validator)
            ->withInput();
            }
            $destinationPath = 'images/productdetail/'; // upload path
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
        $main_store->description = Input::get('description');
        if($main_store->update()){
            $this->request->session()->flash('alert-success', 'Data Updated successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be updated  !!');
        }
        return redirect()->route('productDetail', $main_store->getProduct->slug);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productdetail=Product_has_detail::find($id);
        if($productdetail->delete()){
            $this->request->session()->flash('alert-success', 'Data deleted successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be deleted!!');
        }
        return back()->withInput();
        
    }
    public function isactive(Request $request,$id)
    {
        $get_is_active = Product_has_detail::where('id',$id)->value('is_active');
        $isactive = Product_has_detail::find($id);
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
