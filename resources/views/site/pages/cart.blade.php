@extends('layouts.master')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('siteasset/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Cart</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ route('site.index') }}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="{{ route('update_cart') }}" method="POST">
                            @csrf
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                            $carts = \App\Models\Cart::with('product')->where('user_id',Auth::id())->get();
                                        @endphp
                                        @foreach ($cart as $item)
                                            @php
                                                    $subtotal += $item->price * $item->qty;
                                            @endphp
                                            <tr>
                                                <td class="product-thumbnail"><a href="{{ route('site.product',$item->product_id) }}">
                                                    <img src="{{ asset('uploads/images/products/'.$item->product->image) }}" alt="product img" /></a>
                                                </td>
                                                <td class="product-name"><a href="{{ route('site.product',$item->product_id) }}">{{ $item->product->name }}</a></td>
                                                <td class="product-price"><span class="amount">$
                                                    @if ($item->product->sale_price)
                                                        {{ $item->product->sale_price }}
                                                    @else
                                                        {{ $item->product->price }}
                                                    @endif


                                                </span></td>
                                                <td class="product-quantity">
                                                    <input type="number" name="new_qty[{{ $item->id }}]" value="{{ $item->qty }}" /></td>
                                                <td class="product-subtotal">${{ $item->price * $item->qty }}</td>
                                                <td class="product-remove"><a href="{{ route('remove_cart',$item->id) }}">X</a></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <input type="submit" value="Update Cart" />
                                        <a href="{{ route('site.shop') }}">Continue Shopping</a>
                                    </div>
                                    {{-- <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input type="text" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </div> --}}
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <br>
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount">${{ number_format($subtotal,2) }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br><br>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
@stop
