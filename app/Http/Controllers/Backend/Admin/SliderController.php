<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('serial')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:200',
            'sub_title' => 'nullable|max:200',
            'description' => 'nullable|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable',
            'button_url' => 'nullable|url',
            'status' => 'required',
            'serial' => 'required|integer',
        ],[
           
            'title.max' => 'Başlık Alanı En Fazla 200 Karakter Olmalıdır',
            
            'sub_title.max' => 'Alt Başlık Alanı En Fazla 200 Karakter Olmalıdır',
           
            'description.max' => 'Açıklama Alanı En Fazla 200 Karakter Olmalıdır',
            'image.required' => 'Resim Alanı Zorunludur',
            'image.image' => 'Resim Alanı Resim Olmalıdır',
            'image.mimes' => 'Resim Alanı jpeg,png,jpg,gif olabilir',
           
            'status.required' => 'Durum Alanı Zorunludur',
            'serial.required' => 'Sıralama Alanı Zorunludur',
        ]);
        $imagePath = $request->file('image')->store('images/sliders', 'public');
        $slider=Slider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'image' => $imagePath,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'status' => $request->status,
            'serial' => $request->serial,
        ]);
        return redirect()->route('admin.slider.index')->with('success','Slider Başarıyla Oluşturuldu');

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
        $slider=Slider::findorfail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable|max:200',
            'sub_title' => 'nullable|max:200',
            'description' => 'nullable|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable',
            'button_url' => 'nullable|url',
            'status' => 'required',
            'serial' => 'required|integer',
        ],[
            'title.max' => 'Başlık Alanı En Fazla 200 Karakter Olmalıdır',
            'sub_title.max' => 'Alt Başlık Alanı En Fazla 200 Karakter Olmalıdır',
            'description.max' => 'Açıklama Alanı En Fazla 200 Karakter Olmalıdır',
            'image.image' => 'Resim Alanı Resim Olmalıdır',
            'image.mimes' => 'Resim Alanı jpeg,png,jpg,gif olabilir',
            'status.required' => 'Durum Alanı Zorunludur',
            'serial.required' => 'Sıralama Alanı Zorunludur',
            ]);

            $slider=Slider::findorfail($id);
            $imagePath = $slider->image;
            if($request->hasFile('image')){
                if($slider->image){
                    Storage::disk('public')->delete($slider->image);
                }
                $imagePath = $request->file('image')->store('images/sliders', 'public');
            }
            $slider->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'image' => $imagePath,
                'button_text' => $request->button_text,
                'button_url' => $request->button_url,
                'status' => $request->status,
                'serial' => $request->serial,
            ]);
            return redirect()->route('admin.slider.index')->with('success','Slider Başarıyla Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider=Slider::findorfail($id);
        if($slider->image){
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success','Slider Başarıyla Silindi');
    }
}