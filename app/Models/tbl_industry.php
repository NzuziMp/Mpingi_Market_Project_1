<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_industry extends Model
{
    protected $table = 'tbl_industries';
    protected $fillable = [
        'id',
        'industry_name',
        'industry_name_fr',
        'industry_image',

    ];
    use HasFactory;
}
