<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_sub_industry extends Model
{
    protected $table = 'tbl_sub_industries';
    protected $fillable = [
        'id',
        'industry_id',
        'sub_industry_name',
        'sub_industry_name_fr',
        'sub_industry_image',

    ];
    use HasFactory;
}
