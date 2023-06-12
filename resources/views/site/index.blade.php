@extends('layouts.master')
@section('content')

    <!-- Start Feature Product -->
    <section class="categories-slider-area bg__white">
        <div class="container">
            <div class="row">
                <!-- Start Left Feature -->
                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                    <!-- Start Slider Area -->
                    <div class="slider__container slider--one">
                        <div class="slider__activation__wrap owl-carousel owl-theme">
                            <!-- Start Single Slide -->
                            @foreach ($latest_product as $product)
                                <div class="slide slider__full--screen slider-height-inherit slider-text-right"
                                style="background: rgba(0, 0, 0, 0) url({{ asset('uploads/images/products/'.$product->image) }}) no-repeat scroll center center / cover ;">
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                            <div class="slider__inner">
                                                <h1>{{ $product->name }} <span class="text--theme">{{ $product->category->name }}</span></h1>
                                                <div class="slider__btn">
                                                    <a class="htc__btn" href="cart.html">shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- End Single Slide -->

                        </div>
                    </div>
                    <!-- Start Slider Area -->
                </div>
                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                    <div class="categories-menu mrg-xs">
                        <div class="category-heading">
                            <h3> Browse Categories</h3>
                        </div>
                        <div class="category-menu-list">
                            <ul>
                                @foreach ($categories as $category)
                                    @php
                                        $has_dropdown = false;
                                        if ($category->child_count > 0) {
                                            $has_dropdown = true;
                                        }

                                    @endphp
                                    <li><a @if (!$has_dropdown) href="{{ route('site.category',$category->id) }}" @endif><img alt=""
                                                src="{{ asset('uploads/images/category/' . $category->image) }}">{{ $category->name }}
                                            @if ($has_dropdown)
                                                <i class="zmdi zmdi-chevron-right"></i>
                                            @endif
                                        </a>
                                        @if ($has_dropdown)
                                            <div class="category-menu-dropdown">
                                                <div class="category-part-1 category-common mb--30">
                                                    <ul>
                                                        @foreach ($category->child as $item)
                                                            <li><a href="{{ route('site.category',$item->id) }}"> {{ $item->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif


                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Left Feature -->
            </div>
        </div>
    </section>
    <!-- End Feature Product -->

    <!-- Start Our Product Area -->
    <section class="htc__product__area bg__whiter ptb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-categories-all">
                        <div class="product-categories-title">
                            <h3>{{ $r_category->name }}</h3>
                        </div>
                        <div class="product-categories-menu">
                            <ul>
                                @foreach ($r_category->child as $category)
                                    <li><a href="{{ route('site.category',$category->id) }}">{{ $category->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style" role="tablist">
                                <li class="active">
                                    <a href="#home1" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>latest </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home2" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>best sale </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home3" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>top rated</h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home4" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>on sale</h4>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane active" id="home1">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        @foreach ($r_category->product as $product)
                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                <div class="product">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a href="{{ route('site.product',$product->id) }}">
                                                                <img src="{{ asset('uploads/images/products/'.$product->image) }}" style="height: 250px; object-fit: cover;"
                                                                    alt="product images">
                                                            </a>
                                                        </div>
                                                        <div class="product__hover__info">
                                                            <ul class="product__action">
                                                                <li><a title="Quick View"
                                                                        class="quick-view modal-view detail-link"
                                                                        href="{{ route('site.product',$product->id) }}"><span class="ti-plus"></span></a>
                                                                </li>
                                                                <form id="remove-item-{{ $product->id }}"  method='POST' action='{{ route('add_to_cart') }}'>
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                        <input type="hidden" name="qty" value="01">
                                                                </form>

                                                                <li><a  onclick="event.preventDefault(); document.getElementById('remove-item-{{ $product->id }}').submit()" title="Add TO Cart"><span class="ti-shopping-cart"></span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product__details">
                                                        <h2><a href="product-details.html">{{ $product->name }}</a></h2>
                                                        <ul class="product__price">
                                                            @if ($product->sale_price)
                                                                <li class="old__price">${{ $product->price }}</li>
                                                                <li class="new__price">${{ $product->sale_price }}</li>
                                                            @else
                                                                <li class="new__price">${{ $product->price }}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Product Area -->


    <!-- Start Our Product Area -->
    <section class="htc__product__area bg__whiter ptb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-categories-all">
                        <div class="product-categories-title">
                            <h3>{{ $l_category->name }}</h3>
                        </div>
                        <div class="product-categories-menu">
                            <ul>
                                @foreach ($l_category->child as $category)
                                    <li><a href="{{ route('site.category',$category->id) }}">{{ $category->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style" role="tablist">
                                <li class="active">
                                    <a href="#home1" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>latest </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home2" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>best sale </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home3" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>top rated</h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home4" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>on sale</h4>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane active" id="home1">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        @foreach ($l_category->product as $product)
                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                <div class="product">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a href="{{ route('site.product',$product->id) }}">
                                                                <img src="{{ asset('uploads/images/products/'.$product->image) }}" style="height: 250px; object-fit: cover;"
                                                                    alt="product images">
                                                            </a>
                                                        </div>
                                                        <div class="product__hover__info">
                                                            <ul class="product__action">
                                                                <li><a title="Quick View"
                                                                        class="quick-view modal-view detail-link"
                                                                        href="{{ route('site.product',$product->id) }}"><span class="ti-plus"></span></a>
                                                                </li>

                                                                <form id="remove-item-{{ $product->id }}"  method='POST' action='{{ route('add_to_cart') }}'>
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                        <input type="hidden" name="qty" value="01">
                                                                </form>

                                                                <li><a  onclick="event.preventDefault(); document.getElementById('remove-item-{{ $product->id }}').submit()" title="Add TO Cart"><span class="ti-shopping-cart"></span></a></li>



                                                                <li><a title="Wishlist" href="wishlist.html"><span
                                                                class="ti-heart"></span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product__details">
                                                        <h2><a href="product-details.html">{{ $product->name }}</a></h2>
                                                        <ul class="product__price">
                                                            @if ($product->sale_price)
                                                                <li class="old__price">${{ $product->price }}</li>
                                                                <li class="new__price">${{ $product->sale_price }}</li>
                                                            @else
                                                                <li class="new__price">${{ $product->price }}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Product Area -->

    <!-- Start Our Product Area -->
    <section class="htc__product__area bg__whiter ptb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-categories-all">
                        <div class="product-categories-title">
                            <h3>{{ $f_category->name }}</h3>
                        </div>
                        <div class="product-categories-menu">
                            <ul>
                                @foreach ($f_category->child as $category)
                                    <li><a href="{{ route('site.category',$category->id) }}">{{ $category->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style" role="tablist">
                                <li class="active">
                                    <a href="#home1" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>latest </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home2" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>best sale </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home3" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>top rated</h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home4" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>on sale</h4>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane active" id="home1">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        @foreach ($f_category->product as $product)
                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                <div class="product">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a href="{{ route('site.product',$product->id) }}">
                                                                <img src="{{ asset('uploads/images/products/'.$product->image) }}" style="height: 250px; object-fit: cover;"
                                                                    alt="product images">
                                                            </a>
                                                        </div>
                                                        <div class="product__hover__info">
                                                            <ul class="product__action">
                                                                <li><a title="Quick View"
                                                                        class="quick-view modal-view detail-link"
                                                                        href="{{ route('site.product',$product->id) }}"><span class="ti-plus"></span></a>
                                                                </li>
                                                                <form id="remove-item-{{ $product->id }}"  method='POST' action='{{ route('add_to_cart') }}'>
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                        <input type="hidden" name="qty" value="01">
                                                                </form>

                                                                <li><a  onclick="event.preventDefault(); document.getElementById('remove-item-{{ $product->id }}').submit()" title="Add TO Cart"><span class="ti-shopping-cart"></span></a></li>


                                                                <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                                <li><a title="Wishlist" href="wishlist.html"><span
                                                                            class="ti-heart"></span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product__details">
                                                        <h2><a href="product-details.html">{{ $product->name }}</a></h2>
                                                        <ul class="product__price">
                                                            @if ($product->sale_price)
                                                                <li class="old__price">${{ $product->price }}</li>
                                                                <li class="new__price">${{ $product->sale_price }}</li>
                                                            @else
                                                                <li class="new__price">${{ $product->price }}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Product Area -->



@stop
{{--  --}}
