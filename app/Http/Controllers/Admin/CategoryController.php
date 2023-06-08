<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $categories = Category::orderBy('id','DESC')->paginate(10);
            return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $categories = Category::with('parent')->whereNull('parent_id')->get();
        return view('admin.category.create',compact('category','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=> 'required',
        ]);
        $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images/category/'),$new_image);
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'image' => $new_image,
        ]);

        return Redirect::route('admin.category.index')->with('success','تم  إضافة القسم بنجاح');
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
        $category = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')->where('parent_id','!=',$category->id)->get();
        return view('admin.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'image'=> 'nullable',
        ]);

        $new_image = $category->image;
        $del_image = $new_image;

        if($request->hasFile('image')){
            $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/category/'),$new_image);
            File::delete(public_path('uploads/images/category/'.$del_image));
        }

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'image' => $new_image,
        ]);


        return Redirect::route('admin.category.index')->with('success','تم  تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        Category::where('parent_id',$category->id)->update(['parent_id' => null]);
        $category->delete();
        return redirect()->back()->with('success','تم الحذف بنجاح');

    }


    public function trash()
    {
        $categories = Category::onlyTrashed()->orderBy('deleted_at','DESC')->paginate(5);
        return view('admin.category.trash',compact('categories'));
    }

    public function restore(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
            $category->restore();
            return redirect()->route('admin.category.trash')->with('success','تم  استرجاع القسم بنجاح');

    }

    public function forceDelete(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
            if(file_exists(public_path('uploads/images/category/'.$category->image))){
                File::delete(public_path('uploads/images/category/'.$category->image));
            }
            $category->forceDelete();
            return redirect()->route('admin.category.trash')->with('success','تم حذف القسم بنجاح');
    }
}
