<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\ProductRequset;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->orderby('id','desc')->paginate(10);
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->orderby('id','desc')->get();
        $product = new Product();
        return view('admin.product.create',compact('categories','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequset $request)
    {
        $request->validate([
            'image'=> 'required',
        ]);
        $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images/products/'),$new_image);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
            'image' => $new_image,
        ]);

        return Redirect::route('admin.product.index')->with('success','تم  إضافة المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id','name')->orderby('id','desc')->get();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequset $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'image'=> 'nullable',
        ]);

        $new_image = $product->image;
        $del_image = $new_image;

        if($request->hasFile('image')){
            $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/products/'),$new_image);
            File::delete(public_path('uploads/images/products/'.$del_image));
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
            'image' => $new_image,
        ]);


        return Redirect::route('admin.product.index')->with('success','تم  تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success','تم الحذف بنجاح');
    }


    public function trash()
    {
        $product = Product::onlyTrashed()->orderBy('deleted_at','DESC')->paginate(10);
        return view('admin.product.trash',compact('product'));
    }

    public function restore(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('admin.product.trash')->with('success','تم  استرجاع المنتج بنجاح');

    }

    public function forceDelete(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
            if(file_exists(public_path('uploads/images/products/'.$product->image))){
                File::delete(public_path('uploads/images/products/'.$product->image));
            }
            $product->forceDelete();
            return redirect()->route('admin.product.trash')->with('success','تم حذف المنتج بنجاح');

    }
}
