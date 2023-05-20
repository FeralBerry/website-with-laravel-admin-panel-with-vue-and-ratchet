<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class ShopController extends BackController
{
    public function shop_index($command){
        $shop = DB::table('shop')
            ->get();
        $shop_cat = DB::table('shop_category')
            ->get();
        $data = [
            'message' => $command->command,
            'shop' => $shop,
            'shop_cat' => $shop_cat,
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
    public function shop_category_index($command){
        $shop_cat = DB::table('shop_category')
            ->get();
        $data = [
            'message' => $command->command,
            'shop_cat' => $shop_cat,
        ];
        return $data;
    }
}
