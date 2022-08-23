<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;
    public $products;
    public $categoryId;
    public $subCategories;

    public function add()
    {
        return view('admin.product.add', [
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),

        ]);
    }

    public function getSubCategory()
    {
        $this->categoryId = $_GET['id'];
        $this->subCategories = SubCategory::where('category_id', $this->categoryId)->get();
        return response()->json($this->subCategories);
    }

    public function create(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request, $this->product->id);
        return redirect()->back()->with('message', 'Product Added Successfully');

    }

    public function manage()
    {
        return view('admin.product.manage',[
            'products' => Product::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($id)
    {
        $this->product = Product::find($id);
        return view('admin.product.detail', ['product' => $this->product]);
    }

    public function edit($id)
    {
        return view('admin.product.edit',[
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
            'product' => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        if ($request->file('other_image'))
        {
            OtherImage::updateOtherImage($request, $id);
        }
        return redirect('/manage-product')->with('message', 'Product Info Updated Successfully');

    }


    public function delete($id){
        Product::deleteProduct($id);
        return redirect('/manage-product')->with('message', 'Product Info Delete Successfully');
    }


}
