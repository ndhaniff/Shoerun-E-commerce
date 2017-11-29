@extends('layouts.app')

@section('content')
@include('inc.banner')
    <div class="cart-body min-h container bg-fff p-5">
        <h3>Your Cart</h3><hr>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Qty</th>
            <th scope="col">Size</th>
            <th scope="col">Color</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($cartItem) > 0)
                @foreach($cartItem as $cart)
                <tr scope="row" >
                    <td>{{$cart->name}}</td>
                    <td>RM {{$cart->price}}</td>
                    <td>{{$cart->qty}}</td>
                    <td>{{$cart->options['size']}}</td>
                    <td>{{$cart->options['color']}}</td>
                    <td><a href="/cart/remove/{{$cart->rowId}}"><i class="text-danger ion-ios-trash"></i></a></td>
                </tr>
                @endforeach
            @else
                <tr><td colspan="6">Your Cart Is Empty</td></tr>
            @endif
        </tbody>
    </table>
    <div>
        <div class="container">
        <div class="row">
            <div class="offset-md-7 col-md-5">
            @if(count($cartItem) > 0)
                <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Info</th>
                    <th>Amount</th>
                </tr>
            </thead>
                <tr>
                    <td><strong>Subtotal: </strong></td>
                    <td>RM {{$cartsubTotal}}</td>
                </tr>
                <tr>
                    <td><strong>GST 6% : </strong></td>
                    <td>RM {{$gst}}</td>
                </tr>
                <tr>
                    <td><strong>Total : </strong></td>
                    <td>RM {{$cartTotal}}</td>
                </tr>
            </table>
            </div>
        </div>
        <div class="p-4">
            <a href="/checkout" class="m-auto w-50 btn btn-block text-light add-to-cart">Proceed To Checkout</a>
        </div>
        </div>
        @endif
    </div>
    </div>
@endsection