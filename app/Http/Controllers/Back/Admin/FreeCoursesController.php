<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreeCoursesController extends BackController
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
    public function getEdit($id){
        $free_courses = DB::table('free_courses')
            ->where('id',$id)
            ->get();
        $free_courses_name = DB::table('free_courses_name')
            ->get();
        $data = array_merge($this->adminData(),[
            'free_courses' => $free_courses,
            'free_courses_name' => $free_courses_name,
        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function postEdit(Request $request,$id){
        DB::table('free_courses')
            ->where('id',$id)
            ->update([

            ]);
        return redirect()->route('back-admin-free-courses-index');
    }
    public function delete($id){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
}
