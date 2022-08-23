<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
    private $category;


    public function add()
    {
        return view('admin.category.add');
    }

    public function create(Request $request)
    {
        Category::newCategory($request);
        return redirect()->back()->with('message', 'Category Created Successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));   //compact method value pass
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/manage-category')->with('message', 'Category Info Updated Successfully');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('/manage-category')->with('message', 'Category Info Deleted Successfully');
    }

    public function manage()
    {
        $this->categories = Category::orderBy('id', 'desc')->get();


        return view('admin.category.manage', ['categories' => $this->categories]);  //array method value pass
    }
}
