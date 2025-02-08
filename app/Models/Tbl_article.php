<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_article extends Model
{

    public function sub_categories(){
        return $this->hasMany(Tbl_sub_category::class,'category_id');
       }

       public function products(){
        return $this->hasMany(Tbl_product::class,'category_id');
       }


    use HasFactory;
}
