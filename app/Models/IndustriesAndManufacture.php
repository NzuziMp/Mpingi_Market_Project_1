<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustriesAndManufacture extends Model
{
    use HasFactory;
    protected $table = 'industries_and_manufactures';
    protected $fillable = [
        'id',
        'category_name'
    ];

    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }
    public function industries_and_manufactures_Sub(){
        return $this->belongsTo(IndustriesAndManufactureSubCategories::class);
     }
}
