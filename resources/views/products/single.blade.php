@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('plugins/xzoom/dist/xzoom.css')}}">
@endsection

@section('content')
@include('inc.banner')
    <div class="main-product container-fluid bg-light">
        <div class="row">
            <div class="col-md-6">
                <div class="xzoom-div"> 
                    <div class="m-auto">
                        <img class="xzoom" width="100%" src="/storage/productimg/{{$product->gallery->first()->name}}" xoriginal="/storage/productimg/{{$product->gallery->first()->name}}" />
                    </div>
                    <div class="xzoom-thumbs">
                    @foreach($product->gallery as $product_img)
                        <a href="/storage/productimg/{{$product_img->name}}">
                            <img class="xzoom-gallery" width="80" src="/storage/productimg/{{$product_img->name}}"  xpreview="/storage/productimg/{{$product_img->name}}">
                        </a>
                    @endforeach
                    </div>
                </div>

            </div>
            <div class="col-md-6 text-left">
                <h3 class="text-matte bold">{{$product->product_name}}</h3>
                <span class="rating">
                <i class="text-red ion-ios-star"></i>
                <i class="text-red ion-ios-star"></i>
                <i class="text-red ion-ios-star"></i>
                <i class="text-red ion-ios-star"></i>
                <i class="ion-ios-star-half"></i>
                </span>&nbsp;<span class="text-gray">0 Review</span>
                <br>
                <span class="single-price text-blue bold">RM {{$product->price}}</span>
                <p class="text-red p-0"><strong>Brand: </strong>{{$product->brands->first()->name}}<br>
                <strong>Type: </strong>{{$product->types->first()->name}}<br>
                <strong>Category: </strong>{{$product->category->first()->cat_name}}<br>
                <strong>Product SKU: </strong>{{$product->sku}}<br>
                <strong>Stock: </strong>{{$product->stock}} left
                </p>

                <div class="specification">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-gray bold" for="">SIZE</label>
                            <select class="form-control mb-2" name="" id="">
                                    @foreach(explode(',', $product->size) as $size) 
                                        <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                            </select>
                        <label class="text-gray bold" for="">QUANTITY</label>
                            <input value="1" type="number" min="1" max="999" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="text-gray bold" for="">COLOR</label>
                            <select class="form-control" name="" id="">
                                @foreach(explode(',', $product->color) as $color) 
                                    <option value="{{$color}}">{{$color}}</option>
                                @endforeach
                            </select>

                        </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button class="btn add-to-cart text-light"><i class="ion-bag"></i>&nbsp;ADD TO CART</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-5">
                <div class="container">
                <nav class="nav nav-pills nav-fill">
                <a class="product-nav-link nav-item nav-link active" href="#description" data-toggle="pill">DESCRIPTION</a>
                <a class="product-nav-link nav-item nav-link" href="#delivery" data-toggle="pill">DELIVERY</a>
                <a class="product-nav-link nav-item nav-link" href="#review" data-toggle="pill">REVIEW</a>
                </nav>
                <div class="tab-content p-5">
                    @include('inc.product-tabs')
                </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{asset('plugins/xzoom/dist/xzoom.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".xzoom, .xzoom-gallery").xzoom({
            tint: '#333', 
            Xoffset: 15,
            position: 'lens',
            lensShape: 'circle',
            scroll: true,
            });
    });
    </script>
@endsection