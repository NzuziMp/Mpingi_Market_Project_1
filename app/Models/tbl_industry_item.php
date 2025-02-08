<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_industry_item extends Model
{

    protected $table = 'tbl_industry_items';
    protected $fillable = [
        'id',
        'post_date_of_item',
        'user_id',
        'industry_id',
        'sub_industry_id',
        'first_name',
        'last_name',
        'job_title',
        'department',
        'company_name',
        'company_type',
        'company_motto',
        'company_logo',
        'company_banner',
        'description',
        'p_box',
        'address',
        'address_2',
        'city',
        'state',
        'country',
        'postal_code',
        'phone',
        'mobile',
        'email',
        'fax',
        'website',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'president',
        'advertising',
        'sales',
        'purchasing',
        'marketing',
        'engineering',
        'ad_type',
        'post_expiry_date',
        'post_delete_date',
        'post_date_count',
        'post_expiry_count',
        'post_delete_count',
        'expire_status',
        'views',
        'rate',
        'total_rate',
        'hits',
        'images',
        'banner',
        'company_color',
        'company_title_color',
        'map_location_industry'

    ];
    use HasFactory;
}
