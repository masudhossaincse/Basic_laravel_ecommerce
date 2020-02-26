<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;

class ProductController extends Controller
{
    public function createProduct()
    {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct', ['categories'=>$categories, 'manufacturers'=>$manufacturers]);
    }

    public function storeProduct(Request $request)
    {
        $this->validate($request,[
            'productName'=>'required',
            'productPrice'=>'required',
            'productQuantity'=>'required',
            'productImage'=>'required',
            
        ]);


        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'productImage/';

        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath.$imageName;
        

        

        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();

        return redirect('/product/add')->with('message', 'Product Information Saved Successfully');

    }
}
