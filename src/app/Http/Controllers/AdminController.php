<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function admin(Request $request){
        $categories = Category::all();
        $contacts = Contact::with('category')->nameEmailSearch($request->keyword)->genderSearch($request->gender)->categorySearch($request->category)->dateSearch($request->created_at)->paginate(7)->appends($request->all());
        return view('admin', compact('categories','contacts'));
    }
    public function delete(Request $request){
        Contact::find($request->id)->delete();
        return back()->with('success', 'お問い合わせを削除しました');
    }


    public function export(Request $request)
{
    $query = Contact::with('category');

        if($request->has('keyword'))
            {
                $query->where(function($q) use ($request){
                    $q->where('last_name' , 'like' , '%' . $request->keyword . '%')
                    ->orWhere('first_name' , 'like' , '%' . $request->keyword . '%')
                    ->orWhere('email' , 'like' , '%' . $request->keyword .'%');
                });
            }
        if($request->filled('gender'))
            {
                $query->where('gender',$request->gender);
            }
        if($request->filled('category'))
            {
                $query->where('category_id',$request->category);
            }
        if($request->filled('created_at'))
            {
                $query->whereDate('created_at',$request->created_at);
        }

    $contacts = $query->get();

    return new StreamedResponse(function () use ($contacts) {
        $stream = fopen('php://output', 'w');

        fputs($stream, "\xEF\xBB\xBF");// Excel使用時の文字化けを防ぐ

        fputcsv($stream, [
            'お名前',
            '性別',
            'メールアドレス',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせの内容'
        ]);

        foreach ($contacts as $contact) {
            if($contact->gender == 1){
                $gender = '男性';
            }elseif($contact->gender == 2){
                $gender = '女性';
            }else{
                $gender = 'その他';
            }

            fputcsv($stream, [
                $contact->last_name . ' ' . $contact->first_name,
                $gender,
                $contact->email,
                $contact->address,
                $contact->building,
                $contact->category->content,
                $contact->detail
            ]);
        }
        fclose($stream);
    }, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="contacts_' . date('Ymd') . '.csv"',
    ]);
}

}
