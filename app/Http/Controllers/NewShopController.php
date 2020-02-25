<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewShopController extends Controller
{
    public function index()
    {
    	return view('front-end.home.index');
    }
    public function categoryContent()
    {
    	return view ('front-end.category.category-content');
    }
}
