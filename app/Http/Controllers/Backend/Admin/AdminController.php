<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
            'email' => ['required', 'string', 'email', 'max:255'],
        ],[
            'name.required' => 'İsim Alanı Gereklidir',
            'email.required' => 'Email Alanı Gereklidir',
            'email.email' => 'Email Geçerli Formatta Olmalıdır',

        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone ?? '';
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.profile.index')->with('success', 'profile-updated succesfully');

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
