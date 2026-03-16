<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =
        ['first_name','last_name','gender','email','category_id','tel','address','building','detail',];

    public function scopeNameEmailSearch($query,$keyword){
        if(!empty($keyword))
            {
                $query->where(function($q) use ($keyword){
                    $q->where('last_name','like','%'.$keyword.'%')->orWhere('first_name','like','%'.$keyword.'%')
                    ->orWhere('email','like','%'.$keyword.'%')
                    ->orWhereRaw('CONCAT(last_name, first_name) like ?', ['%' . $keyword . '%'])
                    ->orWhereRaw('CONCAT(last_name," ",first_name) like ?', ['%' . $keyword . '%']);
;
            });
    }
}
    public function scopeGenderSearch($query,$gender){
        if(!empty($gender)){
            $query->where('gender',$gender);
        }
    }

    public function scopeCategorySearch($query,$category_id){
        if(!empty($category_id)){
            $query->where('category_id',$category_id);
        }
    }
    public function scopeDateSearch($query,$created_at){
        if(!empty($created_at)){
            $query->whereDate('created_at',$created_at);
        }
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
