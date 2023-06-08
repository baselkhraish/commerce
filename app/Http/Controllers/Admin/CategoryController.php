<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $categories = Category::orderBy('id','DESC')->get();
            return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('admin.category.create',compact('category'));
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
        $categories = Category::onlyTrashed()->orderBy('deleted_at','DESC')->paginate(5);
        return view('admin.category.trash',compact('categories'));
    }

    public function restore(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        if(Auth::user()->id === $category->user_id){
            $category->restore();

            return redirect()->route('category.trash')->with('success','تم  استرجاع القسم بنجاح');
        }else{
            return view('errors.notfound');
        }
    }

    public function forceDelete(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        if(Auth::user()->id === $category->user_id){
            $category->forceDelete();

            return redirect()->route('category.trash')->with('success','تم حذف القسم بنجاح');
        }else{
            return view('errors.notfound');
        }
    }
}
