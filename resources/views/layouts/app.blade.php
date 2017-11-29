<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('head')
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    @include('inc.navbar')
    
    <div id="app">
            @yield('content')
    </div>

    <footer style="30vh" class="container-fluid bg-blue p-5 text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>STAY CONNECTED</h4><hr>
                        <div class="input-group">
                        <input type="text" class="w-50 form-control" placeholder="email" aria-label="Search for...">
                        <span class="input-group-btn">
                            <button class="btn add-to-cart text-light" type="button">Go!</button>
                        </span>
                        </div>
                    <small>Join over 1m who receive monthly product updates</small>
                    <div style="font-size:2.5rem">
                        <a href="#"><i style="color:#3b5998" class="ion-social-facebook"></i></a>
                        <a href="#"><i style="color:#55acee" class="ion-social-twitter"></i></a>
                        <a href="#"><i style="color:#C32AA3" class="ion-social-instagram"></i></a>
                        <a href="#"><i style="color:#007BB6" class="ion-social-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h4>LOREM IPSUM</h4><hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod, <br>purus a finibus commodo, diam felis faucibus dolor, ut venenatis lorem risus vitae lorem. Nullam eros enim, blandit ac lobortis vel, fermentum nec diam. <br>Nulla facilisis ornare enim ut consequat. Cras sed felis ut augue efficitur posuere. Curabitur dapibus ipsum s</p>
                </div>
                <div class="text-center col-md-4">
                    <h4>POPULAR BRANDS</h4><hr>
                    <p>Nike , Adidas , Reebox ,<br> Line 7 , Puma</p>
                </div>
            </div>
            <hr><p class="text-center">&copy; Copyright 2017 | created by: <a class="text-light" href="nifdesign.com">ndhaniff</a> All Rights Reserved</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('footer')
</body>
</html>
