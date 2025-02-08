<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_imgs extends Model
{

    protected $table = 'tbl_imgs';
    protected $fillable = [
        'id',
        'image_name',
        'upload_id',
        'uid',
        'product_item_id',
    ];

    use HasFactory;

    public function tblImages(){
        return $this->hasMany(tbl_images::class);
    }

    public function tblproductitems(){
        return $this->hasMany(Tbl_products_item::class);
    }

}
