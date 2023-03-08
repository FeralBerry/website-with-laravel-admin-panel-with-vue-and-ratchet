<?php
namespace App\Http\Controllers\Back\User;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayCoursesController extends BackController
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
            'pay_courses_navigate' => $this->payCoursesNavigate($id),
            'pay_courses' => $this->payCourses($id)
        ]);
        return view('back.user.index',['data' => $data]);
    }
    public function openSingleCourse($course,$id){
        $pay_course = DB::table('pay_courses')
            ->where('id',$id)
            ->where('pay_courses_name_id',$course)
            ->get();
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update([
                'last_open_pay_course_id' => $id
            ]);
        $all_pay_courses_id = DB::table('pay_courses')
            ->where('pay_courses_name_id',$course)
            ->select('id')
            ->get();
        $data = [
            'pay_course' => $pay_course,
            'all_pay_courses_id' => $all_pay_courses_id,
        ];
        return $data;
    }
    public function task(Request $request){
        $free_courses = DB::table('free_courses')
            ->where('id',$request['task_number'])
            ->get();
        foreach ($free_courses as $courses){
            if($courses->example == $request['example']){
                return 'Правильно';
            } else {
                return 'Не верно';
            }
        }
    }
}
