<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\ProductImageGalery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Product::all();
        return view('admin.products.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::where('status',1)->get();
        $categories=Category::where('status',1)->get();
        $subCategories=SubCategory::where('status',1)->get();
        $childCategories=ChildCategory::where('status',1)->get();
        return view('admin.products.create',compact('brands','categories','subCategories','childCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
            'child_category_id' => 'nullable',
            'brand_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'required',
        ],[
            'name.required' => 'Ürün adı zorunludur.',
            'category_id.required' => 'Kategori seçilmedi.',
            'brand_id.required' => 'Marka seçilmedi.',
            'price.required' => 'Fiyat zorunludur.',
            'qty.required' => 'Stok miktarı zorunludur.',
            'status.required' => 'Durum seçilmedi.',
            'image.required' => 'Resim seçilmedi.',
            'short_description.required' => 'Kısa açıklama zorunludur.',
        ]);
        $imagePath=null;
        if($request->hasFile('image')){
            $imagePath=resizeImageHelper($request->file('image'),'products',400,400);
        }

        $product=Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'child_category_id' => $request->child_category_id,
            'thumb_image' => $imagePath,
            'brand_id' => $request->brand_id,
            'sku' => $request->sku,
            'price' => $request->price,
            'qty' => $request->qty,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'video_link' => $request->video_link,
            'offer_price' => $request->offer_price,
            'offer_start_date' => $request->offer_start_date,
            'offer_end_date' => $request->offer_end_date,
            'product_type' => $request->product_type,
            'status' => $request->status,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'source' =>'website',

        ]);

        return redirect()->route('admin.products.index')->with('success','Ürün başarıyla oluşturuldu.');

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
        $product=Product::find($id);
        $brands=Brand::where('status',1)->get();
        $categories=Category::where('status',1)->get();
        $subCategories=SubCategory::where('status',1)->get();
        $childCategories=ChildCategory::where('status',1)->get();
        return view('admin.products.edit',compact('product','brands','categories','subCategories','childCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
            'child_category_id' => 'nullable',
            'brand_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'required',
        ],[
            'name.required' => 'Ürün adı zorunludur.',
            'category_id.required' => 'Kategori seçilmedi.',
            'brand_id.required' => 'Marka seçilmedi.',
            'price.required' => 'Fiyat zorunludur.',
            'qty.required' => 'Stok miktarı zorunludur.',
            'status.required' => 'Durum seçilmedi.',
            'short_description.required' => 'Kısa açıklama zorunludur.',
            'image.image' => 'Resim formatı geçersiz.',
            'image.mimes' => 'Resim formatı geçersiz.',
            'image.max' => 'Resim boyutu en fazla 2MB olmalıdır.',

        ]);

        $product=Product::find($id);
        $imagePath=$product->thumb_image;
        if($request->hasFile('image')){
            $imagePath=resizeImageHelper($request->file('image'),'products',400,400);
        }
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'child_category_id' => $request->child_category_id,
            'thumb_image' => $imagePath,
            'brand_id' => $request->brand_id,
            'sku' => $request->sku,
            'price' => $request->price,
            'qty' => $request->qty,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'video_link' => $request->video_link,
            'offer_price' => $request->offer_price,
            'offer_start_date' => $request->offer_start_date,
            'offer_end_date' => $request->offer_end_date,
            'product_type' => $request->product_type,
            'status' => $request->status,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
        ]);

        return redirect()->route('admin.products.index')->with('success','Ürün başarıyla güncellendi.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        if($product->thumb_image){
            Storage::disk('public')->delete($product->thumb_image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Ürün başarıyla silindi.');
    }

    public function productImages(string $id)
    {
        $product=Product::find($id);

        return view('admin.products.product_images',compact('product'));
    }
    public function productImagesStore(Request $request)
    {
       $request->validate([
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $product=Product::find($request->product_id);
        if ( count(array_merge
            ($product->productImageGaleries->toArray(),$request->images?? [])) > 7) {
            return redirect()->back()->with('error','Ürün detay resmi en fazla 7 tane olabilir.');
        }
        if($request->hasFile('images')){
            foreach($request->images as $image){
                $imagePath=resizeImageHelper($image,'productImageGaleries',400,400);
                ProductImageGalery::create([
                    'product_id' => $request->product_id,
                    'image' => $imagePath,
                ]);
            }
        }
       return redirect()->back()->with('success','Ürün detay resmi başarıyla eklendi.');
    }
    public function productImagesDestroy(string $id)
    {
        $productImageGalery=ProductImageGalery::find($id);
        Storage::disk('public')->delete($productImageGalery->image);
        $productImageGalery->delete();
        return redirect()->back()->with('success','Ürün detay resmi başarıyla silindi.');
    }
}
