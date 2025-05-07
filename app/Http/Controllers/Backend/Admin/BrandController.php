<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Brand::all();
        return view('admin.brands.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured'=>'required',
            'status'=>'required',
        ],[
            'name.required'=>'Marka adı zorunludur',
            'image.required'=>'Resim zorunludur',
            'is_featured.required'=>'Öne çıkan marka seçiniz',
            'status.required'=>'Durum seçiniz',
        ]);
        
        $imagePath=null;
        if($request->hasFile('image')){
            $imagePath=resizeImageHelper($request->file('image'),'brands',400,200);
        }

    Brand::create([
        'name'=>$request->name,
        'is_featured'=>$request->is_featured,
        'status'=>$request->status,
        'image'=>$imagePath,
    ]);

    return redirect()->route('admin.brands.index')->with('success','Marka başarıyla oluşturuldu');
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
        $brand=Brand::findOrFail($id);
        return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured'=>'required',
            'status'=>'required',
        ],[
            'name.required'=>'Marka adı zorunludur',
            'image.required'=>'Resim zorunludur',
            'is_featured.required'=>'Öne çıkan marka seçiniz',
            'status.required'=>'Durum seçiniz',
        ]);
        $brand=Brand::findOrFail($id);
        $imagePath=null;
        if($request->hasFile('image')){
            if($brand->image){
                 Storage::disk('public')->delete($brand->image);
            }
            $imagePath=resizeImageHelper($request->file('image'),'brands',200,200);
        }
        $brand->update([
            'name'=>$request->name,
            'is_featured'=>$request->is_featured,
            'status'=>$request->status,
            'image'=>$imagePath,
        ]);
        return redirect()->route('admin.brands.index')->with('success','Marka başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand=Brand::findOrFail($id);
        if($brand->image){
            Storage::disk('public')->delete($brand->image);
        }
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success','Marka başarıyla silindi');
    }
}