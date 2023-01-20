<?php
namespace App\Helpers;
use App\Http\Controllers\Front\ChatController;
use Illuminate\Support\Facades\DB;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $rooms;
    protected $users_name;
    protected $user_id;
    protected $chatController;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->chatController = new ChatController;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $command = json_decode($msg);
        $user_id = $from->resourceId;
        if($command->command == 'connect'){

            /*$data = $this->chatController->connect($from,$command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
            $data2 = $this->chatController->connection($from,$command);
            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    $client->send(json_encode($data2));
                }
            }*/

        }
        elseif($command->command == 'reconnect'){
            $data = [
                'message' =>'reconnect'
            ];
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'open_chat'){
            $data = $this->chatController->openChat($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'new_message'){
            $data = $this->chatController->newMessage($command);
            $resourceId = $this->chatController->resourceFriendId($command);
            if($resourceId !== NULL){
                foreach ($this->clients as $client) {
                    if ($client->resourceId == $resourceId) {
                        $client->send(json_encode($data));
                    }
                    if($from == $client){
                        $client->send(json_encode($data));
                    }
                }
            } else {
                foreach ($this->clients as $client) {
                    if($from == $client){
                        $client->send(json_encode($data));
                    }
                }
            }
        }
        elseif($command->command == 'search'){
            $data = $this->chatController->search($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'add_friend'){
            $data = $this->chatController->addFriend($command);
            foreach ($this->clients as $client) {
                if($from == $client){
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'request_add_friend'){
            $data = $this->chatController->requestAddFriend($command);
            $resourceId = $this->chatController->resourceFriendId($command);
            if($resourceId !== NULL){
                foreach ($this->clients as $client) {
                    if ($client->resourceId == $resourceId) {
                        $client->send(json_encode($data));
                    }
                }
            }
        }
        elseif($command->command == 'new_status'){
            $data = $this->chatController->newStatus($command);
            $resourceId = $this->chatController->resourceUsersId($command);
            foreach ($this->clients as $client) {
                foreach ($resourceId as $item){
                    if ($client->resourceId == $item) {
                        $client->send(json_encode($data));
                    }
                }
            }
        }
        elseif($command->command == 'view_friends_request'){
            $data = $this->chatController->viewFriendRequest($command);
            foreach ($this->clients as $client) {
                if($from == $client){
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'add_access_friends'){
            $data = $this->chatController->addAccessFriend($command);
            $data2 = $this->chatController->addAccessFriend2($command);
            $resourceId = $this->chatController->resourceFriendId($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
                if($client->resourceId == $resourceId && $resourceId !== NULL){
                    $client->send(json_encode($data2));
                }
            }

        }
        elseif($command->command == 'no_access_friends'){
            $data = $this->chatController->noAccessFriend($command);
            $data2 = $this->chatController->updateFriendList($command);
            $resourceId = $this->chatController->resourceUserId($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
                if($client->resourceId == $resourceId){
                    $client->send(json_encode($data2));
                }
            }
        }
        elseif($command->command == 'right_menu_open'){
            $data = [
                'message' => 'open_right_menu',
                'user_id' => $command->user_id
            ];
            DB::table('users')
                ->where('id',$command->user_id)
                ->update([
                    'right_menu' => 1
                ]);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'right_menu_close'){
            $data = [
                'message' => 'close_right_menu',
                'user_id' => $command->user_id
            ];
            DB::table('users')
                ->where('id',$command->user_id)
                ->update([
                    'right_menu' => 0
                ]);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'change_color'){
            DB::table('users')
                ->where('id',$command->user_id)
                ->update([
                    'themes' => $command->themes
                ]);
        }
        elseif($command->command == 'delete_friend'){
            $data = $this->chatController->deleteFriend($command);
            $resourceId = $this->chatController->resourceFriendId($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
                if($client->resourceId == $resourceId && $resourceId !== NULL){
                    $client->send(json_encode($data));
                }
            }
        }
    }
    public function onClose(ConnectionInterface $conn) {
        $users = DB::table('users')
            ->where('connectionId',$conn->resourceId)
            ->get();
        foreach ($users as $user){
            $user_id = $user->id;
        }
        DB::table('users')
            ->where('connectionId',$conn->resourceId)
            ->update([
                'connectionId' => NULL,
                'online' => 0,
            ]);
        $msg = [
            'message' => 'disconnected_user',
            'user_id' => $user_id,
        ];
        foreach ($this->clients as $client) {
            if ($conn !== $client) {
                $client->send(json_encode($msg));
            }
        }

        $this->clients->detach($conn);
        $room = $this->users[$conn->resourceId];
        unset($this->rooms[$room][$conn->resourceId]);
        unset($this->users[$conn->resourceId]);
        unset($this->users_name[$room][$conn->resourceId]);
        $users = [];
        foreach ($this->users_name[$room] as $user){
            $users[] = $user;
        }
        $msg = ['message' => 'connection','users' => $users];
        foreach ($this->rooms[$room] as $client){
            $client->send(json_encode($msg));
        }
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }


}
