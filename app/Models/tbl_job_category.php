<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_job_category extends Model
{
    protected $table = 'tbl_job_categories';
    protected $fillable = [
        'id',
        'job_category_name',

    ];
    use HasFactory;
}
