<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_job_item extends Model
{

    protected $fillable = [
        'id',
        'post_date_of_item',
        'user_id',
        'job_category_id',
        'first_name',
        'last_name',
        'department',
        'job_title',
        'salary',
        'type_of_job',
        'schedule_from',
        'schedule_to',
        'job_description',
        'city',
        'state',
        'country',
        'postal_code',
        'contract_type',
        'compensation',
        'company_name',
        'company_logo',
        'company_type',
        'employess_number',
        'career_level',
        'degree',
        'experience',
        'skills',
        'p_box',
        'address',
        'phone',
        'mobile',
        'email',
        'fax',
        'website',
        'post_expiry_date',
        'post_delete_date',
        'post_date_count',
        'post_expiry_count',
        'post_delete_count',
        'expire_status',
        'ad_type',
        'views',
        'rate',
        'total_rate',
        'hits',


    ];
    use HasFactory;
}
