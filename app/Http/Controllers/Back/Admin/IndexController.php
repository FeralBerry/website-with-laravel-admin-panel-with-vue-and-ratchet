<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;

class IndexController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function seo(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function navigate(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function contact(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function users(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function user_question(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
}