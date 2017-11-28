@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
@endsection

@extends('layouts.app')

@section('content')
    @include('inc.homeslider')

    <div class="container">
        <div class="row">
            <div class="col-md-3 pl-0">
                <input style="width:83%" type="text" class="input d-inline-block form-control" placeholder="search">
                <span class="btn btn-red"><a  href="#">GO</a></span>
            </div>
            <div class="col-md-2">
                <select class="input form-control" name="sorting">
                    <option value="" selected>Default Sorting</option>
                    <option value="">Most Popular</option>
                </select>
            </div>
            <div class="offset-md-4 col-md-3 text-right">
                <p class="text-gray">showing 300 product result</p>
            </div>
        </div>
        <div class="row">
            @include('inc.sidebar')
            <div class="col-md-9 pr-0">
                <ul class="shop-content row pt-3 pl-3 ">
                @for($i = 0; $i < 12; $i++)
                    <li class="col-md-4 product bg-fff p-5 text-center">
                            <a href="#">
                                <div class="product-img">
                                    <img width="100%" src="{{asset('img/banner1.png')}}" alt="">
                                </div>
                                <span class="product-name">
                                <p class="text-matte">Adidas Adicore Lala</p>
                                <p class="text-blue bold price">RM 256</p>
                                </span>
                                <span class="btn btn-add-to-cart">Add to Cart</span>
                            </a>
                    </li>
                @endfor
                </ul>

                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This is just demo of ndhaniff projects</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <strong>Project Name:</strong>Shoerun<br>
                            <strong>Type:</strong>E-commerce<br>
                            <strong>Creator: </strong>ndhaniff<br>
                            <strong>Technology Used: </strong> PHP,Laravel,html,css,js,jquery<br>
                            <p>Please take a look of this project <br>
                             and if you are interest to hire me,  <br>
                             feel free to contact me by the any button below</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-green"><i class="ion-social-whatsapp-outline">
                                </i>&nbsp;Whatapp Me</button>
                            <button type="button" class="btn btn-primary"><i class="ion-paper-airplane">
                            </i>&nbsp;Mail Me</button>
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