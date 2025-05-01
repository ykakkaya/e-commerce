<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $sliders=Slider::where('status','1')->orderBy('serial')->get();
     
        return view('frontend.home.index',compact('sliders'));
    }
}