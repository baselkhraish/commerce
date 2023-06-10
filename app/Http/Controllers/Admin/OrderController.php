<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with('user')->orderBy('id','DESC')->paginate(10);
        return view('admin.order.index',compact('order'));
    }

    function order_details($id) {
        $cart = Cart::where('order_id',$id)->whereNotNull('order_id')->get();
        return view('admin.order.order_details',compact('cart'));
    }
}
