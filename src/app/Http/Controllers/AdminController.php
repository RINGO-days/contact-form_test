<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function admin(Request $request){
        $categories = Category::all();
        $contacts = Contact::with('category')->nameEmailSearch($request->keyword)->genderSearch($request->gender)->categorySearch($request->category)->dateSearch($request->updated_at)->paginate(7)->appends($request->all());
        return view('admin', compact('categories','contacts'));
    }
    public function delete(Request $request){
        Contact::find($request->id)->delete();
        return back()->with('success', 'お問い合わせを削除しました');
    }
}
