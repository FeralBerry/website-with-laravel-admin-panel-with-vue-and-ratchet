<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Friends;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function connection($from,$command){
        $users = DB::table('users')
            ->where('connectionId',$from->resourceId)
            ->get();
        foreach ($users as $user){
            $status = $user->status;
        }
        $data = [
            'message' => 'new_connection',
            'user_id' => $command->user_id,
            'status' => $status,
        ];
        return $data;
    }
    public function connect($from,$command){
        $auth_user_id = $command->user_id;
        $connection_id = $from->resourceId;
        $friends = DB::table('friends')
            ->where('user_id',$auth_user_id)
            ->whereRaw('friends.user_id != friends.friend_id')
            ->get();
        DB::table('users')
            ->where('id',$auth_user_id)
            ->update([
                'online' => 1,
                'connectionId' => $connection_id,
            ]);
        $users = DB::table('users')
            ->select([
                'id',
                'name',
                'avatar',
                'online',
                'status',
            ])->get();
        $friend = [];
        foreach ($users as $user){
            foreach ($friends as $item){
                if($item->friend_id == $user->id){
                    $items = [
                        'id' => $user->id,
                        'name' => $user->name,
                        'avatar' => $user->avatar,
                        'room_id' => $item->room_id,
                        'status' => $user->status,
                        'online' => $user->online
                    ];
                    $friend[] = $items;
                }
            }
        }
        $count_friend = count($friend);
        $data = [
            'message' => 'friends_list',
            'friends' => $friend,
            'count_friend' => $count_friend,
        ];
        return $data;
    }
    public function openChat($command){
        $chat = DB::table('chat')
            ->where('room_id',$command->room_id)
            ->get();
        DB::table('users')
            ->where('id',$command->user_id)
            ->update(['session_room_id' => $command->room_id]);
        $user = DB::table('users')
            ->select([
                'id',
                'name',
                'avatar'
            ])
            ->where('id',$command->user_id)
            ->get();
        foreach ($user as $item){
            $user_id = $item->id;
            $user_name = $item->name;
            $user_avatar = $item->avatar;
        }
        $friend = DB::table('users')
            ->select([
                'id',
                'name',
                'avatar',
                'email',
                'profession',
            ])
            ->where('id',$command->friend_id)
            ->get();
        foreach ($friend as $item){
            $friend_id = $item->id;
            $friend_name = $item->name;
            $friend_avatar = $item->avatar;
            $friend_email = $item->email;
            $friend_profession = $item->profession;
        }
        $friend_settings = DB::table('user_settings')
            ->where('id',$command->friend_id)
            ->get();
        $data = [
            'message' => 'open_chat',
            'friend_id' => $friend_id,
            'friend_name' => $friend_name,
            'friend_avatar' => $friend_avatar,
            'friend_email' => $friend_email,
            'friend_profession' => $friend_profession,
            'friend_settings' => $friend_settings,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_avatar' => $user_avatar,
            'chat' => $chat,
        ];
        return $data;
    }
    public function newMessage($command){
        $user_id = $command->user_id;
        $friend_id = $command->friend_id;
        $text_message = $command->value;
        $user = DB::table('users')
            ->select([
                'id',
                'name',
                'avatar',
                'session_room_id',
            ])
            ->where('id',$user_id)
            ->get();
        foreach ($user as $item){
            $user_name = $item->name;
            $user_avatar = $item->avatar;
            $user_session_room_id = $item->session_room_id;
        }
        $friends = Friends::all()
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id);
        foreach ($friends as $item){
            $room = $item->room_id;
        }
        $chat = Chat::create([
                'message' => $text_message,
                'user_id' => $user_id,
                'room_id' => $room
            ]);
        $chat = DB::table('chat')
            ->where('id',$chat->id)
            ->get();
        foreach ($chat as $item){
            $created_at = $item->created_at;
        }
        $data = [
            'message' => 'new_message',
            'text_message' => $text_message,
            'user_name' => $user_name,
            'user_avatar' => $user_avatar,
            'user_id' => $user_id,
            'room_id' => $room,
            'user_session_room_id' => $user_session_room_id,
            'created_at' => $created_at
        ];
        return $data;
    }
    public function search($command){
        $auth_user_id = $command->user_id;
        $search_user = $command->value;
        $friends = DB::table('friends')
            ->where('user_id',$auth_user_id)
            ->select([
                'user_id',
                'friend_id',
                'room_id',
            ])
            ->get();
        $items = $auth_user_id;
        foreach ($friends as $friend){
            $items = $items.','.$friend->friend_id;
        }
        $items = explode(',',$items);
        $search_users = DB::table('users')
            ->where('name','LIKE',"%$search_user%")
            ->orWhere('id','LIKE',"%$search_user%")
            ->select([
                'id',
                'name',
                'avatar',
            ])
            ->get();
        $count_user = count($search_users);
        $j = '';
        for($i = 0;$i < $count_user;$i++){
            foreach ($items as $item){
                if($search_users[$i]->id == $item){
                    $j = $i;
                }
            }
            $search_users->forget($j);
        }
        $users = [];
        foreach ($search_users as $user){
            $users[] = [
                'id' => $user->id,
                'name' => $user->name,
                'avatar' => $user->avatar
            ];
        }
        $friends_added = DB::table('friends_add')
            ->where('user_id',$auth_user_id)
            ->get();
        $data = [
            'message' => 'search',
            'users' => $users,
            'friends_added' => $friends_added,
        ];
        return $data;
    }
    public function addFriend($command){
        $user_id = $command->user_id;
        $friend_id = $command->friend_id;
        $friends_added = NULL;
        $rooms = DB::table('rooms')
            ->where('users',$user_id.';'.$friend_id)
            ->orWhere('users', $friend_id.';'.$user_id)
            ->get();
        if(count($rooms) == 0){
            DB::table('rooms')
                ->insert([
                    'users' => $user_id.';'.$friend_id,
                ]);
        }
        $friends_added = DB::table('friends_add')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->get();
        if(count($friends_added) !== 0){
            $data = [
                'action' => 'already_added',
                'user_id' => $user_id,
                'friend_id' => $friend_id,
            ];
        } else {
            DB::table('friends_add')
                ->insert([
                    'user_id' => $user_id,
                    'friend_id' => $friend_id,
                ]);
            $data = [
                'action' => 'friend_added',
                'user_id' => $user_id,
                'friend_id' => $friend_id,
            ];
        }
        return $data;
    }
    public function resourceFriendId($command){
        $online = DB::table('users')
            ->where('id',$command->friend_id)
            ->select([
                'id',
                'name',
                'online',
                'connectionID',
            ])
            ->get();
        $resourceId = NULL;
        foreach ($online as $item){
            if($item->online == 1){
                $resourceId = $item->connectionID;
            }
        }
        return $resourceId;
    }
    public function requestAddFriend($command){
        $friend_id = $command->friend_id;
        $friends_add = DB::table('friends_add')
            ->where('friend_id',$friend_id)
            ->get();
        $count_request = count($friends_add);
        $data = [
            'message' => 'request_add_friend',
            'friend_id' => $friend_id,
            'count_request' => $count_request,
        ];
        return $data;
    }
    public function array_unique_key($array, $key) {
        $tmp = $key_array = array();
        $i = 0;
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $tmp[$i] = $val;
            }
            $i++;
        }
        return $tmp;
    }
    public function resourceUserId($command){
        $online = DB::table('users')
            ->where('id',$command->user_id)
            ->select([
                'connectionId'
            ])
            ->get();
        foreach ($online as $item){
            $resourceId = $item->connectionId;
        }
        return $resourceId;
    }
    public function resourceUsersId($command){
        $user_id = $command->user_id;
        $friends = DB::table('friends')
            ->where('user_id',$user_id)
            ->join('users','friends.friend_id','=','users.id')
            ->where('connectionId','!=',NULL)
            ->get();
        $items = [];
        foreach ($friends as $friend){
            $items[] = $friend->connectionID;
        }
        return $items;
    }
    public function newStatus($command){
        $user_id = $command->user_id;
        $status = str_replace('toggle-button','',$command->status);
        DB::table('users')
            ->where('id',$user_id)
            ->update([
                'status' => $status
            ]);
        $data = [
            'message' => 'new_status_friends',
            'status' => $status,
            'user_id' => $user_id,
        ];
        return $data;
    }
    public function viewFriendRequest($command){
        $user_id = $command->user_id;
        $friends = DB::table('friends_add')
            ->where('friend_id',$user_id)
            ->join('users','friends_add.user_id','=','users.id')
            ->get();
        $items = [];
        foreach ($friends as $friend){
            $items[] = [
                'user_id' => $friend->id,
                'avatar' => $friend->avatar,
                'name' => $friend->name,
                'status' => $friend->status,
                'online' => $friend->online
            ];
        }
        $data = [
            'message' => 'view_add_friends_list',
            'friends' => $items
        ];
        return $data;
    }
    public function addAccessFriend($command){
        $user_id = $command->user_id;
        $friend_id = $command->friend_id;
        $friend_add = DB::table('friends_add')
            ->where('user_id',$friend_id)
            ->where('friend_id',$user_id)
            ->get();
        $room_users = DB::table('rooms')
            ->where('users',$user_id.';'.$friend_id)
            ->get();
        $room_id = 0;
        foreach ($room_users as $room){
            $room_id = $room->id;
        }
        if(!empty($friend_add)){
            DB::table('friends')
                ->insert([
                    'user_id' => (int)$user_id,
                    'friend_id' => (int)$friend_id,
                    'room_id' => (int)$room_id,
                ]);
            DB::table('friends')
                ->insert([
                    'user_id' => (int)$friend_id,
                    'friend_id' => (int)$user_id,
                    'room_id' => (int)$room_id,
                ]);
        }
        $friends = DB::table('friends')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->join('users','users.id','=','friends.friend_id')
            ->select([
                'users.id',
                'friends.user_id',
                'friends.friend_id',
                'friends.room_id',
                'users.online',
                'users.status',
                'users.name',
                'users.avatar',
            ])
            ->get();
        $friends_user = DB::table('friends')
            ->where('user_id',$user_id)
            ->select('id')
            ->get();
        DB::table('friends_add')
            ->where('user_id',$friend_id)
            ->where('friend_id',$user_id)
            ->delete();
        $count_friend = count($friends_user);
        $data = [
            'message' => 'add_friend_list',
            'user_id' => $user_id,
            'friend_id' => $friend_id,
            'friends' => $friends,
            'room_id' => $room_id,
            'count_friend' => $count_friend,
        ];
        return $data;
    }
    public function addAccessFriend2($command){
        $user_id = $command->user_id;
        $friend_id = $command->friend_id;
        $user = DB::table('users')
            ->where('id',$user_id)
            ->select([
                'id',
                'name',
                'avatar',
                'status',
                'online',
            ])
            ->get();
        $friends_user = DB::table('friends')
            ->where('user_id',$friend_id)
            ->get();
        $count_friend = count($friends_user);
        $friends = DB::table('friends')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->get();
        foreach ($friends as $friend){
            $room_id = $friend->room_id;
        }
        $data = [
            'message' => 'new_friend_access',
            'users' => $user,
            'count_friend' => $count_friend,
            'room_id' => $room_id,
        ];
        return $data;
    }
    public function updateFriendList($command){
        $online = DB::table('users')
            ->where('id',$command->friend_id)
            ->select('connectionId')
            ->get();
        $user = DB::table('users')
            ->where('id',$command->user_id)
            ->select([
                'id',
                'name',
                'online',
                'status',
                'avatar',
            ])
            ->get();
        $rooms = DB::table('friends')
            ->where('user_id',$command->user_id)
            ->select('room_id')
            ->get();
        $room_id = 0;
        foreach ($rooms as $room){
            $room_id = $room->room_id;
        }
        foreach ($online as $item){
            $resourceId = $item->connectionId;
        }
        $data = [
            'message' => 'add_new_friend_list',
            'resourceId' => $resourceId,
            'users' => $user,
            'room_id' => $room_id,
        ];
        return $data;
    }
    public function deleteFriend($command){
        $friend_id = $command->friend_id;
        $user_id = $command->user_id;
        $rooms = DB::table('friends')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->get();
        $room_id = 0;
        foreach ($rooms as $room){
            $room_id = $room->room_id;
        }
        DB::table('chat')
            ->where('room_id',$room_id)
            ->delete();
        $room_open = DB::table('users')
            ->where('id',$friend_id)
            ->get();
        $open = 'close';
        foreach ($room_open as $item){
            if($item->session_room_id == $room_id){
                $open = 'open';
            }
        }
        DB::table('friends')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->delete();
        DB::table('friends')
            ->where('user_id',$friend_id)
            ->where('friend_id',$user_id)
            ->delete();
        DB::table('rooms')
            ->where('users',$user_id.';'.$friend_id)
            ->orWhere('users',$friend_id.';'.$user_id)
            ->delete();
        $data = [
            'message' => 'delete_friend',
            'user_id' => $user_id,
            'friend_id' => $friend_id,
            'open' => $open,
        ];
        return $data;
    }
    public function noAccessFriend($command){

    }
}
