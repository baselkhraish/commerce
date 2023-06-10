<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('siteasset/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png') }}">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('siteasset/css/bootstrap.min.css') }}">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="{{ asset('siteasset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('siteasset/css/owl.theme.default.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('siteasset/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('siteasset/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('siteasset/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('siteasset/css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('siteasset/css/custom.css') }}">


    <!-- Modernizr JS -->
    <script src="{{ asset('siteasset/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @stack('css')
</head>

<body>


    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="{{ route('site.index') }}">
                                    <img src="{{ asset('siteasset/images/logo/logo.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="{{ route('site.index') }}">Home</a></li>
                                    <li class="drop"><a href="{{ route('site.shop') }}">Shop</a></li>
                                    <li class="drop"><a href="{{ route('cart') }}">Cart</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="{{ route('site.index') }}">Home</a></li>
                                        <li><a href="{{ route('site.shop') }}">Shop</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">
                            <ul class="menu-extra">
                                <li><a href="{{ route('login') }}"><span class="ti-user"></span></a></li>
                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        @php
                            $subtotal = 0;
                            $carts = \App\Models\Cart::with('product')->whereNull('order_id')->where('user_id',Auth::id())->get();
                        @endphp
                        @foreach ($carts as $cart)
                            @php
                                $subtotal += $cart->price * $cart->qty;
                            @endphp
                            <div class="shp__single__product">
                                <div class="shp__pro__thumb">
                                    <a href="#">
                                        <img src="{{ asset('uploads/images/products/'.$cart->product->image) }}"
                                            alt="product images">
                                    </a>
                                </div>
                                <div class="shp__pro__details">
                                    <h2><a href="">{{ $cart->product->name }}</a></h2>
                                    <span class="quantity">QTY: {{ $cart->qty }}</span>
                                    <span class="shp__price">${{ $cart->price }}</span>
                                </div>
                                <div class="remove__btn">
                                    {{-- <form id="remove-item-{{ $cart->id }}" action="{{ route('remove_cart',$cart->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form> --}}
                                    {{-- <a onclick="event.preventDefault(); document.getElementById('remove-item-{{ $cart->id }}').submit()" title="Remove this item"><i class="zmdi zmdi-close"></i></a> --}}
                                    <a href="{{ route('remove_cart',$cart->id) }}" title="Remove this item"><i class="zmdi zmdi-close"></i></a>

                                </div>
                            </div>
                        @endforeach

                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">${{ number_format($subtotal,2) }}</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="{{ route('cart') }}">View Cart</a></li>
                        <li class="shp__checkout"><a href="{{ route('checkout') }}">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->

        <!-- End Header Style -->

        @yield('content')




        <!-- Start Footer Area -->
        @include('site.parts.footer')
        <!-- End Footer Area -->
    </div>
    <!-- jquery latest version -->
    <script src="{{ asset('siteasset/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('siteasset/js/bootstrap.min.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('siteasset/js/plugins.js') }}"></script>
    <script src="{{ asset('siteasset/js/slick.min.js') }}"></script>
    <script src="{{ asset('siteasset/js/owl.carousel.min.js') }}"></script>
    <!-- Waypoints.min.js. -->
    <script src="{{ asset('siteasset/js/waypoints.min.js') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('siteasset/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        @endif
    </script>

    @stack('js')
</body>

</html>
