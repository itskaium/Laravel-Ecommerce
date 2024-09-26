<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request) {
        $category = new Category();
        $category->category_name = $request->category;
        $category->save();
        return redirect()->back();
    }

    public function delete_category($id){

        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_category(Request $request, $id){

        $data = Category::find($id);

        return view('admin.categories.edit', compact('data'));

    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        return redirect('admin/categories');
    }
}
