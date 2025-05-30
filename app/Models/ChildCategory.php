<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $guarded=[];

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
