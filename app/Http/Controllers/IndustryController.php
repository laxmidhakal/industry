<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;

class IndustryController extends Controller
{
	public function index()
	{
		return view('welcome');
	}

	public function indexAbout()
	{
		$about_details = About::get();
		$page_title = "About";
		return view('about',compact(['about_details','page_title']));
	}

	public function indexCompanies()
	{
		return view('companies');
	}

	public function indexGallery()
	{
		return view('gallery');
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
