<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_chat extends Model
{
    use HasFactory;
    protected $table = 'tbl_chats';
    protected $fillable = [
        'id',
        'seller_id',
        'buyer_id',
        'message',
        'email',
        'message_status',
        'date_created',
        'reply',
        'date_reply'
    ];
}
