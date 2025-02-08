<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_userlink extends Model
{

    protected $table = 'tbl_userlinks';
    protected $fillable = [
        'id',
        'user_id',
        'login_date',
        'website_name',
        'website_link',
        'facebook_link',
        'twitter_link',
        'youtube_link',
        'instagram_link',
        'map_link'
    ];

    use HasFactory;
}
