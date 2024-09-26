<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function home(){
        $products = Product::all();
        $user = Auth::user();
        $user_id = $user->id;

        $count = Cart::where('user_id', $user_id)->count();

        return view('home.index', compact('products','count'));
    }
}