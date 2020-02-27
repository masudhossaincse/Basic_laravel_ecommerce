<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;

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

    public function manageProduct()
    {
        $products = DB::table('products')
                            ->join('categories', 'products.categoryId', '=', 'categories.id')
                            ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                            ->select('products.productName', 'products.id', 'categories.categoryName', 'products.productPrice', 'products.productQuantity', 'products.publicationStatus',  'manufacturers.manufacturerName')
                            ->get();
                            
        return view('admin.product.manageProduct',['products'=>$products]);
    }

    public function viewProduct($id)
    {
        $productById = DB::table('products')
                            ->join('categories', 'products.categoryId', '=', 'categories.id')
                            ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                            ->select('products.*','categories.categoryName', 'manufacturers.manufacturerName')
                            ->where('products.id', $id)
                            ->first();

        return view('admin.product.viewProduct', ['product'=>$productById]);
    }

    public function editProduct($id)
    {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $productById = Product::where('id', $id)->first();
        return view('admin.product.editProduct', ['productById'=>$productById, 'categories'=>$categories, 'manufacturers'=>$manufacturers]);
    }

    public function updateProduct(Request $request)
    {
        $imageUrl = $this->imageExistStatus($request);
        echo $imageUrl;
        exit();
    }
    private function imageExistStatus($request)
    {
        $productById = Product::where('id', $request->productId)->first();
        if($productImage)
        {
            unlink($productById->productImage);
            $name = $productImage->getClientOriginalName();
            $uploadPath = 'productImage/';
            $productImage->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }
        else
        {
            $imageUrl = $productById->productImage;
        }
        return $imageUrl;

    }




}
