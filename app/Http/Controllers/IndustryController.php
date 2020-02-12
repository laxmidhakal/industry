<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\Company;
use App\Gallery;
use App\Team;
use App\Product;
<<<<<<< HEAD
=======
use App\Setting;



>>>>>>> origin/master

class IndustryController extends Controller
{
	public function index()
	{
		$index_details = Slider::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "Welcome";
		return view('welcome',compact(['index_details','page_title','settings','about_details']));
	}

	public function indexAbout()
	{
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "About";
		return view('about',compact(['about_details','page_title','settings']));
	}

	public function indexCompanies()
	{
		$companies_details = Company::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "Companies";
		return view('companies',compact(['companies_details' ,'page_title','settings']));
	}

	public function indexGallery()
	{
		$gallery_details = Gallery::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "Gallery";
		return view('gallery' ,compact(['gallery_details' ,'page_title','settings']));
	}

	public function indexProduct()
	{
<<<<<<< HEAD
		$product_details = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
        $page_title = "Product";
		return view('product' ,compact(['product_details' ,'page_title']));
=======
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);

		return view('product',compact('settings'));
>>>>>>> origin/master
	}

	public function indexTeam()
	{
		$team_details = Team::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title ='Team';
		return view('team' ,compact(['team_details' ,'page_title','settings']));
	}

	public function indexContact()
	{
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		return view('contact',compact('settings'));
	}
}
