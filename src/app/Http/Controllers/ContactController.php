<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('contact', compact('categories'));
    }
    public function reset(Request $request){
        $request->session()->forget('contact');
        return redirect('/');
    }

    public function confirm(Request $request){
        $contact = $request->all();
        $contact['tel'] = $request->first_tel . $request->mid_tel . $request->last_tel;
        $genders = [
            "1" => "男性",
            "2" => "女性",
            "3" => "その他",
        ];
        $category = Category::find($request->category);
        $contact['category_content'] = $category->content;
        $request -> session()->put('contact',$contact);
        return view('confirm',compact('contact'));
    }

    public function thanks(Request $request){
        $request->session()->forget('contact');
        return view('thanks');
    }

    
}
