<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_sub_category extends Model
{
    protected $table = 'tbl_sub_categories';
    protected $fillable = [
        'id',
        'category_id',
        'sub_category_name_en',
        'sub_category_name_fr',
        'sub_category_image',
        'link',

    ];


    public function categories(){
        return $this->belongsTo(Tbl_category::class);
       }

       public function articles(){
        return $this->belongsTo(Tbl_article::class,'category_id');
       }



    use HasFactory;
}
