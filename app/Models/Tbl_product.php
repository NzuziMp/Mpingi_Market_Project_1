<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_product extends Model
{

    protected $table = 'tbl_products';
    protected $fillable = [
        'id',
        'category_id',
        'sub_category_id',
        'article_id',
        'product_name_en',
        'product_name_fr',
        'product_image',

    ];

    public function article(){
        return $this->belongsTo(Tbl_article::class,'category_id');
       }

    use HasFactory;
}
