<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_mping_business extends Model
{
    protected $table = 'tbl_mping_businesses';
    protected $fillable = [
        'user_id',
        'email',
        'register_date',
        'business_name',
        'business_motto',
        'business_logo',
        'business_type',
        'dealers_in',
        'department',
        'job_title',
        'i_am_a',
        'fax',
        'po_box',
        'website',
        'address',
        'shipping',
        'notification',
        'banner_color',
        'banner_title_color',
        'country_id',
        'state_id',
        'city_id',
        'shop_status',
        'description',
        'views',
        'type',
        'business_icon',

    ];
    use HasFactory;
}
