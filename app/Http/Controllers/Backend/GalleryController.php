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
use App\Gallery;
use App\Helper\Helper;

class GalleryController extends Controller
{
    public function __construct(Request $request, Helper $helper)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->helper = $helper;
    }
    public function index()
    {
        $galleries=Gallery::orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(10);
        return view('backend.gallery.index',compact('galleries'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg|max:1024',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/gallery')
        ->withErrors($validator)
        ->withInput();
        }
        $main_store = new Gallery;
        $main_store->title = Input::get('title');
        $main_store->slug = $this->helper->slug_converter($main_store->title);
        $image = Input::file('image');
        if($image != ""){
            $destinationPath = 'images/gallery/'; // upload path
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
        //var_dump($name); die();
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
       $sort_ids =  Gallery::find($id);
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
        $galleries = Gallery::where('id', $id)->get();
        return view('backend.gallery.edit', compact('galleries','id'));
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
        return back()->withErrors($validator)->withInput();
        }
        $main_store=Gallery::find($id);
        $main_store->title = Input::get('title');
        $main_store->slug = $this->helper->slug_converter($main_store->title);
        $image = Input::file('image');
        if($image != ""){
             $rules = array(
                'image' => 'required|mimes:jpeg,jpg|max:1024',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
            return redirect('/home/gallery')
            ->withErrors($validator)
            ->withInput();
            }
            $destinationPath = 'images/gallery/'; // upload path
            $oldFilename=$destinationPath.$main_store->image_enc;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
            $destinationPath = 'images/gallery/'; // upload path
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
        return redirect('/home/gallery');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=Gallery::find($id);
        if($gallery->delete()){
            $this->request->session()->flash('alert-success', 'Data delete successfully!!');
        }else{
            $this->request->session()->flash('alert-waring', 'Data could not be deleted!!');
        }
        return back()->withInput();
    }
    public function isactive(Request $request,$id)
    {
        $get_is_active = Gallery::where('id',$id)->value('is_active');
        $isactive = Gallery::find($id);
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
