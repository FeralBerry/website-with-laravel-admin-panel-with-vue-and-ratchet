<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;

class PayCoursesController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function add(Request $request){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function edit(Request $request,$id){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function delete($id){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
}
