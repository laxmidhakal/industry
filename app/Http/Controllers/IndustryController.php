<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndustryController extends Controller
{
	public function index()
	{
		return view('welcome');
	}

	public function about()
	{
		return view('about');
	}

	public function companies()
	{
		return view('companies');
	}

	public function gallery()
	{
		return view('gallery');
	}

	public function product()
	{
		return view('product');
	}

	public function team()
	{
		return view('team');
	}

	public function contact()
	{
		return view('contact');
	}
}
