<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_messages extends Model
{
    protected $table = 'tbl_messages';
    protected $fillable = [
        'id',
        'send_date',
        'profile_user',
        'full_name',
        'user_id',
        'category_id',
        'sub_category_id',
        'article_id',
        'product_id',
        'sub_product_id',
        'product_item',
        'email',
        'mobile',
        'subject',
        'message',
        'read_status',
        'Reply_status',
        'type',
    ];
    use HasFactory;
}
