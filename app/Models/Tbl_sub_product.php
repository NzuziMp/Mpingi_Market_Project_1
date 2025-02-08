<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_sub_product extends Model
{
    protected $table = 'tbl_sub_products';
    protected $fillable = [
        'id',
        'post_date_of_item',
        'category_id',
        'subcategory_id',
        'article_id',
        'product_id',
        'sub_product_name_en',
        'sub_product_name_fr',

    ];
    use HasFactory;
}
