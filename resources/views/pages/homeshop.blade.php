@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <style>
        .main-nav{
            background:#092e4b !important;
        }
    </style>
@endsection

@extends('layouts.app')

@section('content')

    <div class="container p-5">
        <div class="row">
            <div class="col-md-3 pl-0">
                <form class="searchform" action="/search" method="get">
                    <input name="search" style="width:83%" type="text" class="input d-inline-block form-control" placeholder="search">
                    <button type="submit" id="search" class="btn btn-red text-light">GO</button>
                </form>
            </div>
            <div class="col-md-2">
                <select class="input form-control" name="sorting">
                    <option value="" selected>Default Sorting</option>
                    <option value="">Most Popular</option>
                </select>
            </div>
            <div class="results offset-md-4 col-md-3 text-right">
                <p class="text-gray">showing {{count($products)}} product result</p>
            </div>
        </div>
        <div class="row">
            @include('inc.sidebar')
            <div class="product-list col-md-9 pr-0">
                <ul class="shop-content row pt-3 pl-3 ">
                @if(count($products) > 0)
                @foreach($products as $product)
                    <li class="col-md-4 product bg-fff p-5 text-center">
                            <a href="/products/single/{{$product->id}}">
                                <div class="product-img">
                                    <img width="100%" src="/storage/productimg/{{$product->gallery->first()->name}}" alt="">
                                </div>
                                <span class="product-name">
                                <p class="text-matte bold">{{$product->product_name}}</p>
                                <p class="text-blue text-serif bold price">RM {{$product->price}}</p>
                                </span>
                                <a href="/products/single/{{$product->id}}"><span class="btn btn-add-to-cart">View Product</span></a>
                            </a>
                    </li>
                @endforeach
                @else <p>No Product</p>
                @endif
                </ul>

                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This website is demo of ndhaniff personal projects</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <strong>Project Name:</strong>Shoerun<br>
                            <strong>Type:</strong>E-commerce<br>
                            <strong>Creator: </strong>ndhaniff<br>
                            <strong>Technology Used: </strong>
                            <hr><strong>Backend:</strong> Laravel(mvc),PHP(oop)<br>
                                <strong>Front-End:</strong> Jquery,sass,bootstrap<br>
                                <small class="text-success">there is no cms or ecommerce management software behind this site</small>
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
        </div>
            
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js    "></script>
    <script>
        $('.shop-slider').slick({
            dots: true,
            infinite: false,
             speed: 300,
             autoplay:true,
            accessibility:true,
            arrows:true,
        });
        $(function(){
            setTimeout(function(){
                $('.modal').modal('show');
            },3000);
        });

    </script>
@endsection