<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=SubCategory::all();
        return view('admin.sub_category.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::where('status','1')->get();
        return view('admin.sub_category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'name'=>'required|unique:sub_categories,name',
            'category_id'=>'required|not_in:null',
            'status'=>'required',
        ],[
            'name.required'=>'Alt Kategori adı boş olamaz',
            'name.unique'=>'Alt Kategori adı zaten mevcut',
            'category_id.not_in'=>'Kategori adı boş olamaz',
            'category_id.required'=>'Kategori adı boş olamaz',
            'status.required'=>'Durum boş olamaz',
        ]);
        SubCategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'status'=>$request->status,
            'slug'=>Str::slug($request->name),
        ]);
        return redirect()->route('admin.sub_category.index')->with('success','Alt Kategori başarıyla oluşturuldu');

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
        $sub_category=SubCategory::findOrFail($id);
        $categories=Category::where('status','1')->get();
        return view('admin.sub_category.edit',compact(['categories','sub_category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|unique:sub_categories,name,'.$id,
            'category_id'=>'required',
            'status'=>'required',
        ],[
            'name.required'=>'Alt Kategori adı boş olamaz',
            'category_id.required'=>'Kategori adı boş olamaz',
            'status.required'=>'Durum boş olamaz',
        ]);
        $sub_category=SubCategory::findOrFail($id);
        $sub_category->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'status'=>$request->status
            ]);

        return redirect()->route('admin.sub_category.index')->with('success','Alt Kategori başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sub_category=SubCategory::findOrFail($id);
        $sub_category->delete();
        return redirect()->route('admin.sub_category.index')->with('success','Alt Kategori başarıyla silindi');
    }
}
