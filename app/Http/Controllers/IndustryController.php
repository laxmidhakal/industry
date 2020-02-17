<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\Company;
use App\Gallery;
use App\Team;
use App\Product;
use App\Product_has_detail;
use App\Setting;
use App\Social;


class IndustryController extends Controller
{
	public function index()
	{
		$index_details = Slider::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "Gobal SAS Trading";
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->get();
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('welcome',compact(['index_details','page_title','settings','about_details','product_menu','settings','socials']));
	}

	public function indexAbout()
	{
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(1);
		$team_details = Team::where('is_active', true)->orderBy('sort_id','DESC')->get();
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$page_title = "About";
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('about',compact(['about_details','page_title','settings','product_menu','settings','team_details','socials']));
	}

	public function indexCompanies()
	{
		$companies_details = Company::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(3);
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$page_title = "Companies";
		$product_main = Product_has_detail::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		if (count($product_main) < 3) {
			$product_details = $product_main;
		}else{
			$product_details = $product_main->random(3);
		}
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('companies',compact(['companies_details' ,'page_title','settings','product_menu','settings','about_details','product_details','socials']));
	}
	public function indexCompaniesDetail($slug)
	{
		$company_id = Company::where('slug',$slug)->value('id');
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "Product";
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$companies_details = Company::where('id',$company_id)->where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(3);
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('companies_detail',compact('settings','page_title','product_menu','product_menu','settings','about_details','socials','companies_details'));
	}

	public function indexGallery()
	{
		$gallery_details = Gallery::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(1);
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$page_title = "Gallery";
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('gallery' ,compact(['gallery_details' ,'page_title','settings','product_menu','settings','about_details','socials']));
	}


	public function indexProduct($slug)
	{
		$product_id = Product::where('slug',$slug)->value('id');
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "Product";
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$product_details = Product_has_detail::where('product_id',$product_id)->where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->paginate(1);
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('product',compact('settings','page_title','product_menu','product_details','product_menu','settings','about_details','socials'));
	}

	public function indexProductDetail($product,$slug)
	{
		$product_id = Product::where('slug',$product)->value('id');
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$page_title = "ProductDetail";
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$product_details = Product_has_detail::where('slug',$slug)->where('product_id',$product_id)->where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_main = Product_has_detail::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		if (count($product_main) < 3) {
			$products = $product_main;
		}else{
			$products = $product_main->random(3);
		}
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('product-detail',compact('settings','page_title','product_menu','product_details','settings','about_details','product_id','socials','products'));
	}

	public function indexTeam()
	{
		$team_details = Team::where('is_active', true)->orderBy('sort_id','DESC')->paginate(1);
		$settings=Setting::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get()->take(1);
		$product_menu = Product::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$page_title ='Team';
		$socials = Social::orderBy('created_at','DESC')->get()->take(1);
		return view('team' ,compact(['team_details' ,'page_title','settings','product_menu','settings','about_details','socials']));
	}

	public function indexContact()
	{
		
	}
}
