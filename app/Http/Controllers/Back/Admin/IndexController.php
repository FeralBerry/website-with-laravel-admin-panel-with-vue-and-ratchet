<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;

class IndexController extends BackController
{
    public function index(){
        $data = array_merge($this->mainData(),[

        ]);
        return view('back.user.index',['data' => $data]);
    }
}
