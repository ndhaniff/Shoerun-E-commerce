<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItem = Cart::content();
        $cartsubTotal = Cart::total();
        $cartsub = str_replace(',', '', $cartsubTotal);
        $tax = $this->calculategst($cartsub);
        $gst = number_format($tax,2);
        $cartTotal = $gst + (float)$cartsub;
        $total = number_format($cartTotal, 2);
    

        //return $cartItem;
        return view('cart.index')->with('cartItem',$cartItem)
        ->with('cartsubTotal',$cartsubTotal)
        ->with('cartTotal',$total)
        ->with('gst',$gst);
    }

    protected function calculategst($cartsubTotal){
        return (6/100) * (float)$cartsubTotal;
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $color = $request->color;
        $p_id = $request->pid;
        $qty = $request->qty;
        $size = $request->size;

        $product = Product::find($p_id);

        Cart::add([
            'id' => $product->id, 
            'name' => $product->product_name,
            'qty' => $qty,
            'price' => $product->price,
            'options' => [
                'size' => $size,
                'color' => $color
                ]
            ]);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($rowId){
        Cart::remove($rowId);
        $cartItem = Cart::content();
        return redirect('cart')->with('cartItem',$cartItem);
    }

    public function destroy($id)
    {
        //
    }
}
