<?php

namespace App\Http\Controllers;

use App\Models\ChatRoomModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        $userId = Auth::user()->id;
        $data = User::select('id', 'name', 'email')
            ->where('id', '!=', $userId)
            ->where(function ($q) use ($request) {
                if (!empty($request->search)) {
                    $q->where('users.name', 'like', '%' . $request->search . '%');
                }
                
            })
            ->get()->toArray();
            
        $rooms = ChatRoomModel::select('id','chat_room_id', 'chat_room_name', 'type')
            ->where('chat_room_name', '!=', '')
            ->where(function ($q) use ($request) {
                if (!empty($request->search)) {
                    $q->where('chat_rooms.chat_room_name', 'like', '%' . $request->search . '%');
                }
                
            })
            ->get()->toArray();

        return view('dashboard', ['data'=>$data, 'rooms'=> $rooms]);
    }
}
