<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ChildCategory::all();
        return view('admin.child_category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.child_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'status' => 'required|boolean',
        ],[
            'name.required'=>'Alt Kategori adı boş olamaz',
            'name.max'=>'Alt Kategori adı en fazla 255 karakter olabilir',
            'category_id.required'=>'Kategori seçilmedi',
            'sub_category_id.required'=>'Alt Kategori seçilmedi',
            'status.required'=>'Durum seçilmedi',
        ]);

        ChildCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.child_category.index')->with('success', 'Alt Kategori başarıyla oluşturuldu');
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
    public function edit($id)
{
    $item = ChildCategory::findOrFail($id);
    $categories = Category::all();
    $sub_categories = SubCategory::where('category_id', $item->category_id)->get();

    return view('admin.child_category.edit', compact('item', 'categories', 'sub_categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'status' => 'required|boolean',
        ],[
            'name.required'=>'Alt Kategori adı boş olamaz',
            'name.max'=>'Alt Kategori adı en fazla 255 karakter olabilir',
            'category_id.required'=>'Kategori seçilmedi',
            'sub_category_id.required'=>'Alt Kategori seçilmedi',
            'status.required'=>'Durum seçilmedi',
        ]);

        $item = ChildCategory::find($id);
        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.child_category.index')->with('success', 'Alt Kategori başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ChildCategory::find($id);
        $item->delete();
        return redirect()->route('admin.child_category.index')->with('success', 'Alt Kategori başarıyla silindi');
    }

    public function subcategoryAjax($id)
    {
        $sub_categories = SubCategory::where('category_id', $id)->get();
        return $sub_categories;
    }

    public function childcategoryAjax($id)
    {
        $child_categories = ChildCategory::where('sub_category_id', $id)->get();
        return $child_categories;
    }
}
