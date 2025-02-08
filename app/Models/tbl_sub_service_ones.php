<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_sub_service_ones extends Model
{
    protected $table = 'tbl_sub_service_ones';
    protected $fillable = [
        'id',
        'service_id',
        'sub_service_id',
        'sub_service_1_name',
        'sub_service_1_name_fr',

    ];
    use HasFactory;
}
