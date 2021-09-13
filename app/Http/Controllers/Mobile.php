<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mobile extends Controller
{
    public function index()
	{
		return view('index.mobile.index');
	}
}
