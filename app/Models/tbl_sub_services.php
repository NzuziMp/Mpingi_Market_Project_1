<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_sub_services extends Model
{
    protected $table = 'tbl_sub_services';
    protected $fillable = [
        'id',
        'service_id',
        'sub_service_name',
        'sub_service_name_fr',
        'sub_service_image',
    ];
    use HasFactory;

    public function services(){
        return $this->hasMany(tbl_services::class);
       }

}
