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

        $f_category = Category::with('product','child')->orderBy('id','ASC')->whereNull('parent_id')->first();
        $l_category = Category::with('product','child')->orderBy('id','DESC')->whereNull('parent_id')->first();
        $r_category = Category::with('product','child')->inRandomOrder()->whereNull('parent_id')->where('id',$f_category->id)->where('id',$l_category->id)->first();

        return view('site.index',compact('categories','latest_product','r_category','f_category','l_category'));
    }

    public function shop()
    {
        $product = Product::orderby('id','desc')->paginate(12);
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
