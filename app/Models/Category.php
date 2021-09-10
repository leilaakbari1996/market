<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function parent(){//rabete Category ba khodash.
        return $this->belongsTo(Category::class,'category_id');//category valed ra baer migardanad.
    }
    public function childrens(){
        return $this->hasMany(Category::class,'category_id');
    }
}
