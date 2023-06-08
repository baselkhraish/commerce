<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function trash()
    {
        $categories = Product::onlyTrashed()->orderBy('deleted_at','DESC')->paginate(5);
        return view('admin.product.trash',compact('categories'));
    }

    public function restore(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        if(Auth::user()->id === $product->user_id){
            $product->restore();

            return redirect()->route('product.trash')->with('success','تم  استرجاع القسم بنجاح');
        }else{
            return view('errors.notfound');
        }
    }

    public function forceDelete(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        if(Auth::user()->id === $product->user_id){
            $product->forceDelete();

            return redirect()->route('product.trash')->with('success','تم حذف القسم بنجاح');
        }else{
            return view('errors.notfound');
        }
    }
}
