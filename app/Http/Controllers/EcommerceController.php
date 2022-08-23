<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    private $categories;
    private $products;
    private $product;

    public function index()
    {
        $this->products = Product::orderBy('id', 'desc')->take(8)->get();
        return view('front.home.home', [
            'products' => $this->products
        ]);
    }

    public function productCategory($id)
    {
        $this->products = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.category-product', ['products' => $this->products]);
    }

    public function productSubCategory($id)
    {
        $this->products = Product::where('sub_category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.sub-category-product', ['products' => $this->products]);
    }

    public function productDetail($id)
    {
        $this->product = Product::find($id);
        return view('front.product.detail', ['product' => $this->product]);
    }


}
