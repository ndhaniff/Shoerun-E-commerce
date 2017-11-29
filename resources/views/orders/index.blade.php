@extends('layouts.app')

@section('head')
    <style>
        .main-nav{
            background:#092e4b !important;
        }
    </style>
@endsection

@section('content')
<div style="height:100vh" class="container bg-fff p-5">
    <h3 class="text-center p-2">Thank You Your Order have been Submitted</h3><hr>
    <h3>Order Details<span class="float-right">ref: #order{{$order->id}}</span></h3>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Order Item</th>
                <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr>
                    <td>{{$cart->name}}</td>
                    <td>{{$cart->qty}}</td>
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
            <div class="col-md-12">
                <h3>Shipping Details</h3>
                <strong>Address: </strong>{{$customer->address}}<br>
                <strong>City: </strong>{{$customer->city}}<br>
                <strong>State: </strong>{{$customer->state}}<br>
                <strong>Zipcode: </strong>{{$customer->zip}}<br>
            </div>
            <div class="col-md-12 text-right text-serif">
                <strong>Total: </strong>RM {{$cartTotal}}<br>
            </div><hr>
    </div>
                    <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This is the end of the demo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <strong>Project Name:</strong>Shoerun<br>
                            <strong>Type:</strong>E-commerce<br>
                            <strong>Creator: </strong>ndhaniff<br>
                            <strong>Technology Used: </strong>
                            <strong>Backend:</strong> Laravel(mvc),PHP(oop)<br>
                                <strong>Front-End:</strong> Jquery,sass,bootstrap<br><hr>
                                <small class="text-success">there is no cms or ecommerce management software behind this site</small><br>
                                <small class="text-danger">Demo purpose only. Some features are not implemented.</small>
                            <hr><p>Please take a look of this project <br>
                             feel free to contact me by the any button below</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info"><a class="text-light" href="http://nifdesign.com"><i class="ion-ios-world">
                                </i>&nbsp;My Website</a></button>
                            <button type="button" class="btn btn-green"><a class="text-light" href="https://mail.google.com/mail/?view=cm&fs=1&to=ndhaniff@gmail.com&su=Enquiry&body=Your Message"><i class="ion-social-whatsapp-outline">
                                </i>&nbsp;Whatapp Me</a></button>
                            <button type="button" class="btn btn-primary"><a class="text-light" href="https://api.whatsapp.com/send?phone=01136161402"><i class="ion-paper-airplane">
                            </i>&nbsp;Mail Me</a></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
</div>
@endsection
@section('footer')
<script>
    $(function(){
            setTimeout(function(){
                $('.modal').modal('show');
            },3000);
        });
</script>
@endsection