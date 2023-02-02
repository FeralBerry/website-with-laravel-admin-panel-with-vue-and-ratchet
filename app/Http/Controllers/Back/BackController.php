<?php
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class BackController extends Controller
{
    public function __construct(){

    }
    protected function mainData(){
        $auth = false;
        $auth_user_name = '';
        $auth_user_id = '';
        $last_open_free_course_id = '';
        if(Auth::user()){
            $auth = true;
            $auth_user_name = Auth::user()->name;
            $auth_user_id = Auth::user()->id;
            $auth_user_avatar = Auth::user()->avatar;
            $last_open_free_course_id = Auth::user()->last_open_free_course_id;
        }
        $free_courses = NULL;
        $free_courses_navigate = NULL;
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        if (Request::route()->getName() == 'back-free-course-index') {
            $url = explode('/', $url[0]);
            $count_url = count($url);
            $url = $url[$count_url-1];
            $free_courses = $this->freeCourses($url);
            $free_courses_navigate = $this->freeCoursesNavigate($url);
        }
        $data = [
            'auth' => $auth,
            'user_name' => $auth_user_name,
            'auth_user_avatar' => $auth_user_avatar,
            'auth_user_id' => $auth_user_id,
            'last_open_free_course_id' => $last_open_free_course_id,
            'free_courses_name' => $this->freeCoursesName(),
            'free_courses' => $free_courses,
            'free_courses_navigate' => $free_courses_navigate,
        ];
        return $data;
    }
    public function freeCoursesName(){
        $free_courses_name = DB::table('free_courses_name')
            ->get();
        foreach ($free_courses_name as $courses_name => $value){
            $free_courses = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->get();
            $free_courses_tasks = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->where('type',1)
                ->get();
            $free_courses_lessons = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->where('type',0)
                ->get();
            $array = json_encode($free_courses_name[$courses_name]);
            $array = json_decode(str_replace('"}','","count_article":"'.count($free_courses).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_tasks":"'.count($free_courses_tasks).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_lessons":"'.count($free_courses_lessons).'"}',$array));
            $free_courses_name[$courses_name] = $array;
        }
        return $free_courses_name;
    }
    public function freeCourses($id){
        $free_courses = DB::table('free_courses')
            ->where('free_courses_name_id',$id)
            ->where('id',Auth::user()->last_open_free_course_id)
            ->get();
        return $free_courses;
    }
    public function freeCoursesNavigate($id){
        $free_courses_navigate = DB::table('free_courses')
            ->where('free_courses_name_id',$id)
            ->get();
        return $free_courses_navigate;
    }
}
