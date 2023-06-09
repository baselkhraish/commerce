<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::with('child')->withCount('child')->whereNull('parent_id')->get();
        $latest_product = Product::with('category')->orderBy('id','desc')->take(3)->get();

        return view('site.index',compact('categories','latest_product'));
    }

    public function shop()
    {
        $product = Product::orderby('id','desc')->paginate(10);
        return view('site.pages.shop',compact('product'));
    }

    public function category($id)
    {
        $category = Category::with('product')->findOrFail($id);
        // dd($category);
        return view('site.pages.shopId',compact('category'));
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);
        return view('site.pages.product',compact('product'));
    }
}
