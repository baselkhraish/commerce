@extends('layouts.master')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('siteasset/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Shop Page</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Shop Page</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
         <!-- Start Our Product Area -->
         <section class="htc__product__area shop__page  bg__white">
            <div class="container">
                <div class="htc__product__container">

                    <div class="row">
                        <div class="product__list another-product-style">
                            @foreach ($product as $item)
                                <!-- Start Single Product -->
                                <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12">
                                    <div class="product foo">
                                        <div class="product__inner">
                                            <div class="pro__thumb">
                                                <a href="{{ route('site.product',$item->id) }}">
                                                    <img src="{{ asset('uploads/images/products/'.$item->image) }}" alt="product images" style="height:200px; object-fit: cover">
                                                </a>
                                            </div>
                                            <div class="product__hover__info">
                                                <ul class="product__action">
                                                    <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                    <form id="remove-item-{{ $item->id }}"  method='POST' action='{{ route('add_to_cart') }}'>
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                            <input type="hidden" name="qty" value="01">
                                                    </form>

                                                    <li><a  onclick="event.preventDefault(); document.getElementById('remove-item-{{ $item->id }}').submit()" title="Add TO Cart"><span class="ti-shopping-cart"></span></a></li>


                                                    <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__details">
                                            <h2><a href="{{ route('site.product',$item->id) }}">{{ $item->name }}</a></h2>
                                            <ul class="product__price">
                                                @if ($item->sale_price)
                                                    <li class="old__price">${{ $item->price }}</li>
                                                    <li class="new__price">${{ $item->sale_price }}</li>
                                                @else
                                                <li class="new__price">${{ $item->price }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            @endforeach
                        </div>
                        <br>
                        {{ $product->links() }}
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
     @stop
