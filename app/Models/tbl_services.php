<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_services extends Model
{
    protected $table = 'tbl_services';
    use HasFactory;

    public function sub_services(){
        return $this->belongsTo(tbl_sub_services::class);
       }

}
