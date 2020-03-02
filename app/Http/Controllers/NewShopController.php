<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class NewShopController extends Controller
{
    public function index()
    {
    	$publishProducts = Product::all();
    	return view('front-end.home.index', ['publishProducts'=>$publishProducts]);
    }
    public function categoryContent($id)
    {
    	$publishedCategoryProducts = Product::where('categoryId', $id)
    										->where('publicationStatus', 1)
    										->get();
    	return view ('front-end.category.category-content', ['publishedCategoryProducts'=>$publishedCategoryProducts]);
    }
}
