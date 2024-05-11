<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoomParticipantsModel extends Model
{
    use HasFactory;
    protected $table = 'chat_room_participants';
    protected $fillable = [
        'id',
        'chat_room_id',
        'participant_id',
        'created_at',
        'updated_at'
    ];
}


