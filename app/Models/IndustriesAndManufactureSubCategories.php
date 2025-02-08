<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustriesAndManufactureSubCategories extends Model
{
    use HasFactory;
    protected $table = 'industries_and_manufacture_sub_categories';
    protected $fillable = [
        'id',
        'sub_category_name'
    ];

    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }


     public function industries_and_manufactures(){
        return $this->hasMany(IndustriesAndManufacture::class);
       }
}
