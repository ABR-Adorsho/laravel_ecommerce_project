<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function add()
    {
        return view('admin.brand.add');
    }
    public function create(Request $request)
    {
        Brand::newBrand($request);
        return redirect()->back()->with('message', 'Brand Created Successfully');
    }

    public function manage()
    {
        $this->brand = Brand::orderBy('id', 'desc')->get();
        return view('admin.brand.manage', ['brands' => $this->brand]);  //array method value pass
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));   //compact method value pass
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('/manage-brand')->with('message', 'Brand Info Updated Successfully');
    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('/manage-brand')->with('message', 'Brand Info Deleted Successfully');
    }

}
