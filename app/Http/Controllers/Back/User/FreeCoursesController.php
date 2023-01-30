<?php
namespace App\Http\Controllers\Back\User;

use App\Http\Controllers\Back\BackController;

class FreeCoursesController extends BackController
{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data = array_merge($this->mainData(),[
            'free_courses_name' => $this->freeCoursesName(),
        ]);
        return view('back.user.index',['data' => $data]);
    }
    public function singleCourse($id){
        $data = array_merge($this->mainData(),[
            'free_courses_navigate' => $this->freeCoursesNavigate($id),
            'free_courses' => $this->freeCourses($id)
        ]);
        return view('back.user.index',['data' => $data]);
    }
}
