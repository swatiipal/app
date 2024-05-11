<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoomModel extends Model
{
    use HasFactory;
    protected $table = 'chat_rooms';
    protected $fillable = [
        'id',
        'chat_room_id',
        'chat_room_name',
        'type',
        'created_at',
        'updated_at'
    ];
}


