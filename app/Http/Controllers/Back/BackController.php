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
        $last_open_pay_course_id = '';
        if(Auth::user()){
            $auth = true;
            $auth_user_name = Auth::user()->name;
            $auth_user_id = Auth::user()->id;
            $auth_user_avatar = Auth::user()->avatar;
            $last_open_free_course_id = Auth::user()->last_open_free_course_id;
            $last_open_pay_course_id = Auth::user()->last_open_pay_course_id;
        }
        $free_courses = NULL;
        $pay_courses = NULL;
        $free_courses_navigate = NULL;
        $pay_courses_navigate = NULL;
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        if (Request::route()->getName() == 'back-free-course-index') {
            $url = explode('/', $url[0]);
            $count_url = count($url);
            $url = $url[$count_url-1];
            $free_courses = $this->freeCourses($url);
            $free_courses_navigate = $this->freeCoursesNavigate($url);
        }
        if (Request::route()->getName() == 'back-pay-course-index') {
            $url = explode('/', $url[0]);
            $count_url = count($url);
            $url = $url[$count_url-1];
            $free_courses = $this->payCourses($url);
            $free_courses_navigate = $this->payCoursesNavigate($url);
        }
        $version = DB::table('version')
            ->get();
        foreach($version as $item){
            $version = $item->version;
        }
        $data = [
            'auth' => $auth,
            'user_name' => $auth_user_name,
            'auth_user_avatar' => $auth_user_avatar,
            'auth_user_id' => $auth_user_id,
            'last_open_free_course_id' => $last_open_free_course_id,
            'last_open_pay_course_id' => $last_open_pay_course_id,
            'free_courses_name' => $this->freeCoursesName(),
            'free_courses' => $free_courses,
            'free_courses_navigate' => $free_courses_navigate,
            'pay_courses_name' => $this->payCoursesName(),
            'pay_courses' => $pay_courses,
            'pay_courses_navigate' => $pay_courses_navigate,
            'version' => $version,
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
    public function payCoursesName(){
        $user = DB::table('users')
            ->where('id',Auth::user()->id)
            ->get();
        $bought_courses_id = NULL;
        foreach ($user as $item){
            $bought_courses_id = $item->bought_courses_id;
        }
        $courses_id = explode(';',$bought_courses_id);
        $pay_courses_name = [];
        foreach ($courses_id as $id){
            $array = DB::table('pay_courses_name')
                ->where('id',$id)
                ->get();
            $pay_courses_name[] = $array;
        }
        foreach ($pay_courses_name as $courses_name => $value){
            foreach ($value as $item){
                $pay_courses = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->get();
                $pay_courses_tasks = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->where('type',1)
                    ->get();
                $pay_courses_lessons = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->where('type',0)
                    ->get();
                $array = json_encode($value);
                $array = json_decode(str_replace('"}','","count_article":"'.count($pay_courses).'"}',$array));
                $array = json_encode($array);
                $array = json_decode(str_replace('"}','","count_tasks":"'.count($pay_courses_tasks).'"}',$array));
                $array = json_encode($array);
                $array = json_decode(str_replace('"}','","count_lessons":"'.count($pay_courses_lessons).'"}',$array));
                $pay_courses_name[$courses_name] = $array;
            }
        }
        return $pay_courses_name;
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
    public function payCourses($id){
        $pay_courses = DB::table('pay_courses')
            ->where('pay_courses_name_id',$id)
            ->where('id',Auth::user()->last_open_pay_course_id)
            ->get();
        return $pay_courses;
    }
    public function payCoursesNavigate($id){
        $pay_courses_navigate = DB::table('pay_courses')
            ->where('pay_courses_name_id',$id)
            ->get();
        return $pay_courses_navigate;
    }
}
