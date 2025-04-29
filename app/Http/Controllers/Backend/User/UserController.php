<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()  {
        $user=auth()->user();
        return view('user.dashboard', compact('user'));
    }
}