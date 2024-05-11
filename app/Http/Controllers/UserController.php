<?php

namespace App\Http\Controllers;

use App\Models\ChatRoomModel;
use App\Models\ChatRoomParticipantsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        return view('chatbox');
    }

    public function storeChats(Request $request){
        
        $participantIds = $request->participant_id;
        $participantIds[] = Auth::id();

        sort($participantIds);

        $participantIdsString = implode('', $participantIds);
        
        $existingChatRoom = ChatRoomParticipantsModel::where('participant_id', $participantIdsString)->first();

        if($existingChatRoom){
            return response()->json(['error' => false, 'message' => 'ChatRoom Already Exists!', 'chat_room_id' => $existingChatRoom->chat_room_id]);
        }else{
            $chat_room_id = md5(time());
            $chat_room = new ChatRoomModel();
            $chat_room->chat_room_id = $chat_room_id;
            $chat_room->chat_room_name = '';
            $chat_room->type = "Chats";
            $chat_room->created_at = now();
            $chat_room->updated_at = now();
            $chat_room->save();

            foreach ($participantIds as $participantId) {
                $chat_room_participants = new ChatRoomParticipantsModel();
                $chat_room_participants->chat_room_id = $chat_room_id;
                $chat_room_participants->participant_id = $participantId;
                $chat_room_participants->created_at = now();
                $chat_room_participants->updated_at = now();
                $chat_room_participants->save();
            }

            if($chat_room->save()){
                return response()->json(['error'=> false, 'message'=> $participantIdsString]);
            }else{
                return response()->json(['error'=> true, 'message'=> 'Error while creating Group!']);
            }
        }
        
    }

    public function storeSpaces(Request $request){
        
        if($request->groupName != "" && $request->has('chatRoomType')){

            $chat_room_id = md5(time());
            $chat_room = new ChatRoomModel();
            $chat_room->chat_room_id = $chat_room_id;
            $chat_room->chat_room_name = $request->groupName;
            $chat_room->type = $request->chatRoomType;
            $chat_room->created_at = now();
            $chat_room->updated_at = now();
            $chat_room->save();

            $participantIds = $request->participant_id;
            $participantIds[] = Auth::id();

            foreach ($participantIds as $participantId) {
                $chat_room_participants = new ChatRoomParticipantsModel();
                $chat_room_participants->chat_room_id = $chat_room_id;
                $chat_room_participants->participant_id = $participantId;
                $chat_room_participants->created_at = now();
                $chat_room_participants->updated_at = now();
                $chat_room_participants->save();
            }

            if($chat_room->save() && $chat_room_participants->save()){
                return response()->json(['error'=> false, 'message'=> 'Group Created!']);
            }else{
                return response()->json(['error'=> true, 'message'=> 'Error while creating Group!']);
            }
            
        }else{
            return response()->json(['error'=> true, 'message'=> 'ChatRoom Type is not Found!']);
        }   

    }

    public function chatroom($id){
        $sender = User::select('name', 'email')->where('id', $id)->get()->first();
        $receiver = User::select('id', 'name', 'email')->get()->toArray();
        return response()->view('chatroom',['sender'=>$sender, 'receiver'=>$receiver]);
    }

    public function receiver(Request $request){
        
        $userId = $request->input('message.userId');

        if ($userId) {
            $receiver = User::select("name", "email")
                ->where("id", $userId)
                ->get()
                ->toArray();

            $response = [
                'code' => 1,
                'msg' => '',
                'data' => [
                    'userId' => $receiver
                ]
            ];

            return response()->json($response);

        } else {
            $response = [
                'code' => 0,
                'msg' => 'receiver data not found.',
                'data' => ''
            ];
            return response()->json($response);
        }
    }
}
