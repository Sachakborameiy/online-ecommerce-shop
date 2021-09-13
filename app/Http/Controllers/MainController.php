<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		return view('index.desktop.index');
	}

	public function new_product()
	{
		return view('pages.desktop.new_product');
	}

	public function product_list()
	{
		return view('pages.desktop.best');
	}

	public function thrify_shopping()
	{
		return view('pages.desktop.thrifty_shopping');
	}

	public function special_goods()
	{
		return view('pages.desktop.special_goods');
	}

	public function good_view()
	{
		return view('pages.desktop.components.shop.goods_view');
	}

	public function mobile()
	{
		return view('pages.desktop.components.shop.goods_view');
	}
}
