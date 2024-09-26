<?php

namespace App\Http\Controllers;

use Stripe;
use Session;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function stripe($value)

    {

        return view('home.stripe', compact('value'));

    }


    public function stripePost(Request $request, $value)

{

    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

  

    $customer = Stripe\Customer::create(array(

            "address" => [

                    "line1" => "Virani Chowk",

                    "postal_code" => "360001",

                    "city" => "Rajkot",

                    "state" => "GJ",

                    "country" => "IN",

                ],

            "email" => "demo@gmail.com",

            "name" => "Hardik Savani",

            "source" => $request->stripeToken

         ));

  

    Stripe\Charge::create ([

            "amount" => $value * 100,

            "currency" => "usd",

            "customer" => $customer->id,

            "description" => "Test payment from itsolutionstuff.com.",

            "shipping" => [

              "name" => "Jenny Rosen",

              "address" => [

                "line1" => "510 Townsend St",

                "postal_code" => "98140",

                "city" => "San Francisco",

                "state" => "CA",

                "country" => "US",

              ],

            ]

    ]); 

  

    Session::flash('success', 'Payment successful!');


    $name = Auth::user()->name;
    $address = Auth::user()->address;
    $phone = Auth::user()->phone;

    $user_id = Auth::user()->id;

    $cart = Cart::where('user_id', $user_id)->get();

    foreach ($cart as $carts) {

        $order = new Order;

        $order->name = $name;
        $order->rec_add = $address;
        $order->phone = $phone;
        $order->user_id = $user_id;
        $order->product_id = $carts->product_id;
        $order->payment_status = 'paid';
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
