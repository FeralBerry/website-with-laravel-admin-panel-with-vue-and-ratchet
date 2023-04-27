<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;

class SlidersController extends BackController
{
    public function slider(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function faq_slider(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
}
