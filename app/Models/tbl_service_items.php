<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_service_items extends Model
{
    protected $table = 'tbl_service_items';
    protected $fillable = [
        'id',
        'post_date_of_item',
        'user_id',
        'mainservice_id',
        'service_id',
        'sub_service_id',
        'sub_service_1_id',
        'sub_service_2_id',
        'sub_service_3_id',
        'first_name',
        'last_name',
        'universities_name',
        'department',
        'company_name',
        'company_type',
        'company_motto',
        'company_logo',
        'company_banner',
        'description',
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
        'company_color',
        'company_title_color',
        'map_location'

    ];
    use HasFactory;
}
