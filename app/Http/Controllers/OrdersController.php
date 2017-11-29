<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Customer;
use App\Order;

class OrdersController extends Controller
{
    public function create(Request $request){
        $carts = Cart::content();
        $cartsubTotal = Cart::total();

        //saving customer details
        $customer = new Customer;
        $customer->first_name = $request->firstname;
        $customer->last_name = $request->lastname;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->shipping_address = $request->address;
        $customer->shipping_poscode = $request->zip;
        $customer->shipping_state = $request->state;
        $customer->city = $request->city;
        $customer->country = 'Malaysia';
        $customer->save();

        //saving orders
        $order = new Order;
        $order->customer_id = $customer->id;
        $order->status = 'pending';
        $order->save();

        return view('orders.index')
        ->with('carts',$carts)
        ->with('subtotal',$cartsubTotal)
        ->with('customer',$request)
        ->with('order',$order);
    }
}
