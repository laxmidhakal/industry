<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;
use App\Company;
use App\Gallery;
use App\product;

class IndustryController extends Controller
{
	public function index()
	{
		return view('welcome');
	}

	public function indexAbout()
	{
		$about_details = About::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$page_title = "About";
		return view('about',compact(['about_details','page_title']));
	}

	public function indexCompanies()
	{
		$companies_details = Company::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$page_title = "Companies";
		return view('companies',compact(['companies_details' ,'page_title']));
	}

	public function indexGallery()
	{
		$gallery_details = Gallery::where('is_active', true)->orderBy('sort_id','DESC')->orderBy('created_at','DESC')->get();
		$page_title = "Gallery";
		return view('gallery' ,compact(['gallery_details' ,'page_title']));
	}

	public function indexProduct()
	{
		
		return view('product');
	}

	public function indexTeam()
	{
		return view('team');
	}

	public function indexContact()
	{
		return view('contact');
	}
}
