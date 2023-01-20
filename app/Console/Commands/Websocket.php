<?php

namespace App\Console\Commands;

use App\Helpers\Chat;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class Websocket extends Command
{
    protected $signature = 'websocket:run';
    protected $description = 'Запуск вебсокета';
    public function __construct(){
        parent::__construct();
    }

    public function handle()
    {
        $wsServer = new WsServer(new Chat());

        $server = IoServer::factory(
            new HttpServer(
                $wsServer
            ),
            4710
        );

        $wsServer->enableKeepAlive($server->loop, 30);

        $server->run();
    }
}
