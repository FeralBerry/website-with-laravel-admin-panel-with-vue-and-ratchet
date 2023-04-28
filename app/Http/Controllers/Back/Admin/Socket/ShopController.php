<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class ShopController extends BackController
{
    public function shop_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function shop_add($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function shop_edit($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
}
