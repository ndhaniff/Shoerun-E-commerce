        <nav class="main-nav navbar navbar-expand-md">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img height="40px" src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                </div>
                        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="#app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i style="font-size:2rem" class="text-light ion-navicon-round"></i></span>
                        </button>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{--  <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li  class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>  --}}
                            <li  class="cart-nav nav-item active"><a class="text-serif nav-link" href="/cart">
                                <i style="position:relative;font-size:1.6rem" class="ion-ios-cart">
                                <span style="
                                font-size:.5rem; position:absolute;
                                top:0;
                                left:.5rem;
                                " class="badge badge-pill badge-danger">{{Cart::count()}}</span>
                                </i>RM <?php echo Cart::total(); ?></a>
                            </li>
                            <li class="cart-content">
                                <?php $carts = Cart::content();?>

                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>