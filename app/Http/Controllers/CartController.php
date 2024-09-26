<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id){
        $product_id = $id;

        $user = Auth::user();
        $user_id = $user->id; 

        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        return redirect()->back();

    }

    public function mycart(){
        $user = Auth::user();
        $user_id = $user->id;

        $count = Cart::where('user_id', $user_id)->count();

        $cart = Cart::where('user_id', $user_id)->get();

        return view('home.mycart', compact('count','cart'));
    }

    public function delete_cart($id){

        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function confirm_order(Request $request){

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $user_id = Auth::user()->id;

        $cart = Cart::where('user_id', $user_id)->get();

        foreach ($cart as $carts) {

            $order = new Order;

            $order->name = $name;
            $order->rec_add = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->save();
            
        }

        $remove_cart = Cart::where('user_id', $user_id)->get();

        foreach ($remove_cart as $remove) {
            $data = Cart::find($remove->id);
            $data-> delete();
        }

        return redirect('/');

    }
}
