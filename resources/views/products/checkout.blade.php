@extends('layouts.app')

@section('content')
@include('inc.banner')
<div class="container-fluid p-5 bg-fff">
    <div class="row">
        <div class="shipping col-md-7 p-4">
        <h3>Shipping Details</h3><small>same as billing for this moment</small><hr>
        <form method="post" id="submitorder" action="order/create">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input required type="text" class="form-control" name="firstname" placeholder="John">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input required type="text" class="form-control" name="lastname" placeholder="Doe">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input required type="text" class="form-control" name="address" placeholder="Jalan Tok Kapak">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input required type="text" class="form-control" name="state" placeholder="Kedah">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input required type="text" class="form-control" name="city" placeholder="Alor Setar">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="zip">Zip</label>
                        <input required type="text" class="form-control" name="zip" placeholder="06300">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input required type="number" class="form-control" name="phone" placeholder="01136161402">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" name="email" placeholder="example@example.com">
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
        </div>
        <div class=" col-md-5 border-gray p-4">
            <h3>Your Cart</h3>
            <table class="table table-bordered bg-light">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{$cart->name}}</td>
                            <td>{{$cart->qty}}</td>
                            <td>RM {{$cart->subtotal}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <?php $cartsubTotal = str_replace(',','',$subtotal);
                  $tax = calculategst($cartsubTotal);
                  $gst = number_format($tax,2);
                  $shipping = 10.60;
                  $cartTotal = number_format($shipping + $gst + (float)$cartsubTotal, 2);

            
                function calculategst($cartsubTotal){
                    return (6/100) * (float)$cartsubTotal;
                }
            ?>
            <div class="text-serif">
                <strong>Subtotal: </strong>RM {{$cartsubTotal}}<br>
                <strong>GST: </strong>RM {{$gst}}<br>
                <strong>Shipping: </strong>RM {{$shipping}}<br>
                <strong>Total: </strong>RM {{$cartTotal}}<br>
            </div><hr>
            <div class="form-group">
                <label for="paymethod">
                    <input name="paymethod" value="Bank Transfer" type="radio" checked>
                    Bank Transfer
                </label>
            </div>
            <button id="placeOrder" class="m-auto w-50 btn btn-block add-to-cart text-light" type="submit">
            <i class="ion-ios-paper-outline"></i> Place Order</button>
            <hr>
            <div><img width="100%" src="/img/FPX.png" alt=""></div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        $("#placeOrder").click( function() {
            $('#submitorder').trigger('submit');
        });
    </script>
@endsection