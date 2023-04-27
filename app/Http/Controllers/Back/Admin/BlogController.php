<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class BlogController extends BackController
{
    public function index(){
        $blog = DB::table('blog')
            ->get();
        $blog_tags = DB::table('blog_tags')
            ->get();
        foreach ($blog as $item => $value){
            $blog[$item]->description = strip_tags($blog[$item]->description);
        }
        $data = array_merge($this->adminData(),[
            'blog' => $blog
        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function add(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function edit(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function tags(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function tagsEdit(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
}
