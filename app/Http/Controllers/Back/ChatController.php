<?php
namespace App\Http\Controllers\Back;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Collection\Collection;

class ChatController extends BackController
{
    public function connection($from,$command){
        /*$users = DB::table('users')
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
        return $data;*/
    }
    public function connect($command){
        $data = [
            'message' => 'new_connect',
            'user_id' => $command->user_id,
        ];
        return $data;
    }
    public function open_course($command){
        $free_courses = DB::table('free_courses')
            ->where('free_courses_name_id',$command->course)
            ->where('id',$command->course_id)
            ->get();
        DB::table('users')
            ->where('id',$command->user_id)
            ->update([
                'last_open_free_course_id' => $command->course_id
            ]);
        $data = [
            'message' => 'open_course',
            'free_courses' => $free_courses,
        ];
        return $data;
    }
    public function open_free_courses(){
        $free_courses_name = DB::table('free_courses_name')
            ->get();
        foreach ($free_courses_name as $courses_name => $value){
            $free_courses = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->get();
            $free_courses_tasks = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->where('type',1)
                ->get();
            $free_courses_lessons = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->where('type',0)
                ->get();
            $array = json_encode($free_courses_name[$courses_name]);
            $array = json_decode(str_replace('"}','","count_article":"'.count($free_courses).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_tasks":"'.count($free_courses_tasks).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_lessons":"'.count($free_courses_lessons).'"}',$array));
            $free_courses_name[$courses_name] = $array;
        }
        $data = [
            'message' => 'open_free_courses',
            'free_courses_name' => $free_courses_name
        ];
        return $data;
    }
    public function open_pay_courses($command){
        $user = DB::table('users')
            ->where('id',$command->user_id)
            ->get();
        foreach ($user as $item){
            $bought_courses_id = $item->bought_courses_id;
        }
        $courses_id = explode(';',$bought_courses_id);
        $pay_courses_name = [];
        foreach ($courses_id as $id){
            $array = DB::table('pay_courses_name')
                ->where('id',$id)
                ->get();
            $pay_courses_name[] = $array;
        }
        foreach ($pay_courses_name as $courses_name => $value){
            foreach ($value as $item){
                $pay_courses = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->get();
                $pay_courses_tasks = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->where('type',1)
                    ->get();
                $pay_courses_lessons = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->where('type',0)
                    ->get();
                $array = json_encode($value);
                $array = json_decode(str_replace('"}','","count_article":"'.count($pay_courses).'"}',$array));
                $array = json_encode($array);
                $array = json_decode(str_replace('"}','","count_tasks":"'.count($pay_courses_tasks).'"}',$array));
                $array = json_encode($array);
                $array = json_decode(str_replace('"}','","count_lessons":"'.count($pay_courses_lessons).'"}',$array));
                $pay_courses_name[$courses_name] = $array;
            }
        }
        $data = [
            'message' => 'open_pay_courses',
            'pay_courses_name' => $pay_courses_name
        ];
        return $data;
    }
    public function open_buy_courses($command){
        $buy_courses_name = DB::table('buy_courses')
            ->get();
        foreach ($buy_courses_name as $courses_name => $value){
            $pay_courses = DB::table('pay_courses')
                ->where('pay_courses_name_id',$value->pay_courses_name_id)
                ->get();
            $pay_courses_tasks = DB::table('pay_courses')
                ->where('pay_courses_name_id',$value->pay_courses_name_id)
                ->where('type',1)
                ->get();
            $pay_courses_lessons = DB::table('pay_courses')
                ->where('pay_courses_name_id',$value->pay_courses_name_id)
                ->where('type',0)
                ->get();
            $array = json_encode($value);
            $array = json_decode(str_replace('"}','","count_article":"'.count($pay_courses).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_tasks":"'.count($pay_courses_tasks).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_lessons":"'.count($pay_courses_lessons).'"}',$array));
            $buy_courses_name[$courses_name] = $array;
        }
        $data = [
            'message' => 'open_buy_courses',
            'buy_courses_name' => $buy_courses_name
        ];
        return $data;
    }
    public function front_footer_message($command){
        if (strlen($command->footer_name)>255 || strlen($command->footer_name)<3) {
            $data = [
                'message' => 'footer_name_error',
            ];
        }elseif (strlen($command->footer_phone)>50 || strlen($command->footer_phone)<3) {
            $data = [
                'message' => 'footer_phone_error',
            ];
        }elseif (strlen($command->footer_message)<3) {
            $data = [
                'message' => 'footer_message_error',
            ];
        } else {
            DB::table('footer_message')
                ->insert([
                    'name' => $command->footer_name,
                    'phone' => $command->footer_phone,
                    'message' => $command->footer_message,
                ]);
            $data = [
                'message' => 'footer_success',
            ];
        }
        return $data;
    }
    public function front_blog($command){
        $seo = DB::table('seo')
            ->where('url',$command->url)
            ->get();
        $blog = DB::table('blog')
            ->paginate(1);
        $data = [
            'seo' => $seo,
            'blog' => $blog
        ];
        return $data;
    }
    /*public function openChat($command){
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

    }*/
}
