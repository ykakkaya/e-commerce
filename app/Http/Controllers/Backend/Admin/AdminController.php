<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profileIndex()
    {
        $user=auth()->user();
        return view('admin.profile.index',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
        ],[
            'name.required' => 'İsim Alanı Gereklidir',
            'email.required' => 'Email Alanı Gereklidir',
            'email.email' => 'Email Geçerli Formatta Olmalıdır',
            'email.unique' => 'Bu Email Daha Önce Kullanılmış',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone ?? '';
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        if($request->image){
            if($user->image){
                Storage::disk('public')->delete($user->image);

            }

           $image_path=resizeImageHelper($request->file('image'),'users',350,350);
           $user->image = $image_path;
        }
        $user->save();
        //toastr()->success('Profiliniz Başarıyla Güncellendi!');

        return redirect()->route('admin.profile.index')->with('info','Profiliniz Başarıyla Güncellendi!');

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
}
