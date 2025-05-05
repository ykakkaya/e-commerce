<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Category::get();
        return view('admin.category.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon'=>'required|not_in:empty',
            'name'=>'required',
            'status'=>'required',
        ],[
            'icon.required'=>'Kategori İkonu Boş Bırakılamaz',
            'icon.not_in'=>'Kategori İkonu Boş Bırakılamaz',
            'name.required'=>'Kategori Adı Boş Bırakılamaz',
            'status.required'=>'Kategori Durumu Boş Bırakılamaz',
        ]);
        Category::create([
            'icon'=>$request->icon,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.category.index')->with('success','Kategori Başarıyla Eklendi');
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
        $category=Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon'=>'required|not_in:empty',
            'name'=>'required',
            'status'=>'required',

        ],[
            'icon.required'=>'Kategori İkonu Boş Bırakılamaz',
            'icon.not_in'=>'Kategori İkonu Boş Bırakılamaz',
            'name.required'=>'Kategori Adı Boş Bırakılamaz',
            'status.required'=>'Kategori Durumu Boş Bırakılamaz',
        ]);
   
        $category=Category::findOrFail($id);
        $category->update([
            'icon'=>$request->icon,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.category.index')->with('success','Kategori Başarıyla Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success','Kategori Başarıyla Silindi');
    }
}
