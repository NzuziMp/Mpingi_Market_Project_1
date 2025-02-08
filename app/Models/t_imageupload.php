<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_imageupload extends Model
{
    protected $table = 'tbl_images';
    protected $fillable = [
        'id',
        'image_upload_date',
        'user_id',
        'product_item',
        'category_id',
        'sub_category_id',
        'article_id',
        'product_id',
        'sub_product_id',
        'item_name',
        'image_name',
        'image_url',
        'tn_image_url',
    ];
    use HasFactory;

}
