<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function add(){
        
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    public function store(Request $request) {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/admin/products');
    }
}
