<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $order = Order::all();
        $payment = Payment::sum('total');
        $cart = Cart::sum('qty');
        return view('admin.index',compact('products','categories','order','payment','cart'));
    }

}
