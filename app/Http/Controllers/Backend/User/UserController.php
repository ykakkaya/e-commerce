<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()  {

        return view('user.dashboard');
    }

    public function profileUser(){
        $user=auth()->user();
        return view('user.user-profile',compact('user'));
    }

    public function updateUserProfile(Request $request){

         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->user()->id],
        ],[
            'name.required' => 'İsim Alanı Gereklidir',
            'email.required' => 'Email Alanı Gereklidir',
            'email.email' => 'Email Geçerli Formatta Olmalıdır',
            'email.unique' => 'Bu Email Daha Önce Kullanılmış',
        ]);

        $user=auth()->user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if($request->hasFile('image')){
            if($user->image != null){
                Storage::disk('public')->delete($user->image);
            }

            $user->image = $request->file('image')->store('images/users', 'public');
        }
        if($request->password){
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.profile')->with('success','Profiliniz Başarıyla Güncellenmiştir.');
    }
}
