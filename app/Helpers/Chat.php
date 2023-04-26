<?php
namespace App\Helpers;
use App\Http\Controllers\Back\SocketController;
use Illuminate\Support\Facades\DB;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


class Chat implements MessageComponentInterface {
    protected $clients;
    protected $rooms;
    protected $users_name;
    protected $user_id;
    protected $socketController;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->socketController = new SocketController;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        if(!isset($_COOKIE['cookie_id'])){
            srand((double) microtime() * 1000000);
            $uniq_id = uniqid(rand());
            $_COOKIE['cookie_id'] = $uniq_id;
        }
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $command = json_decode($msg);
        if($command->command == 'connect'){
            $data = $this->socketController->connect($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'open_course'){
            $data = $this->socketController->open_course($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    dump($client->resourceId);
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'open_free_courses'){
            $data = $this->socketController->open_free_courses();
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'open_pay_courses'){
            $data = $this->socketController->open_pay_courses($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'open_buy_courses'){
            $data = $this->socketController->open_buy_courses($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'front_footer_message'){
            $data = $this->socketController->front_footer_message($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'front_blog'){
            $data = $this->socketController->front_blog($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'front_blog_article'){
            $data = $this->socketController->front_blog_article($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'blog_comment_add'){
            $data = $this->socketController->blog_comment_add($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
                if($from !== $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'front_shop'){
            $data = $this->socketController->front_shop($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'add_to_cart'){
            $data = $this->socketController->add_to_cart($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'front_index'){
            $data = $this->socketController->front_index();
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'cart'){
            $data = array_merge($this->socketController->cart(),['cart' => 'cart']);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'front_cart'){
            $data = $this->socketController->front_cart();
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif ($command->command == 'shop_rating'){
            $data = $this->socketController->shop_rating($command);
            foreach ($this->clients as $client) {
                $client->send(json_encode($data));
            }
        }
        elseif($command->command == 'shop_search'){
            $data = $this->socketController->shop_search($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'blog_search'){
            $data = $this->socketController->blog_search($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }
        elseif($command->command == 'contact_form_message'){
            $data = $this->socketController->contact_form_message($command);
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(json_encode($data));
                }
            }
        }

    }
    public function onClose(ConnectionInterface $conn) {
        $users = DB::table('users')
            ->where('connection_id',$conn->resourceId)
            ->get();
        foreach ($users as $user){
            $user_id = $user->id;
        }
        DB::table('users')
            ->where('connection_id',$conn->resourceId)
            ->update([
                'connection_id' => NULL,
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
