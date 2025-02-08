<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_products_item extends Model
{

    protected $table = 'tbl_product_items';
    protected $fillable = [
        'id',
        'user_id',
        'post_date_of_item',
        'category_id',
        'sub_category_id',
        'article_id',
        'product_id',
        'sub_product_id',
        'item_name',
        'product_type',
        'brand_name',
        'brand_id',
        'pieces',
        'price',
        'old_price',
        'color_id',
        'sub_color_id',
        'price_range_start',
        'price_range_end',
        'product_color',
        'place_of_origin',
        'city',
        'state_id',
        'item_descriptions',
        'item_images',
        'supplier_name',
        'supplier_region',
        'type',
        'post_expiry_date',
        'post_delete_date',
        'post_date_count',
        'post_expiry_count',
        'post_delete_count',
        'expire_status',
        'ad_type',
        'views',
        'shipping',
        'shipping_price',
        'price_id',
        'rate',
        'total_rate',
        'hits',
        'payment',
        'weight',
        'volume',
        'delivery',
        'day_return',
        'negotiable',
        'currency',
        'category',
        'product_web_name',
        'product_web_link',
        'disponibility',
        'remainingdays_status',
        'expireddate_remain',
        'slug'

    ];
    use HasFactory;

    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }
}
