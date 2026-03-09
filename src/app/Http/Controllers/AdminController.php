<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin(){
        $categories = Category::all();
        
        return view('admin', compact('categories'));
    }
}
