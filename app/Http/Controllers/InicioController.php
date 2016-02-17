<?php namespace App\Http\Controllers;

class InicioController extends Controller 
{
	public function __construct()
	{
	}

	public function index()
	{
		return view('frontend.index');
	}
	
}