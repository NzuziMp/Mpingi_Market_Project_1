<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_category extends Model
{

    protected $table = 'tbl_categories';
    protected $fillable = [
        'id',
        'category_name_en',
        'category_name_fr',
        'category_image',
    ];

    public function sub_categories(){
        return $this->hasMany(Tbl_sub_category::class);
       }

    use HasFactory;
}
