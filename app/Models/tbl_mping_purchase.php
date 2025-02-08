<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_mping_purchase extends Model
{

    protected $table = 'tbl_mping_purchases';
    protected $fillable = [
        'purchase_date',
        'user_id_seller',
        'user_id_buyer',
        'category_id',
        'sub_category_id',
        'article_id',
        'sub_product_id',
        'product_item',
        'full_name',
        'email',
        'mobile',
        'po_box',
        'address_1',
        'address_2',
        'country_id',
        'state_id',
        'city_id',
        'delivery',
        'payment',
        'quantity',
        'price',
        'item_images',
        'shipping_price',
        'total_delivery',
        'total_pickup',
        'message',
        'status',
        'confirm_code'

    ];
    use HasFactory;


}
