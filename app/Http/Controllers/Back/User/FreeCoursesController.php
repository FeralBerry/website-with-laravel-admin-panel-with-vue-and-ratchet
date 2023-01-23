<?php
namespace App\Http\Controllers\Back\User;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class FreeCoursesController extends BackController
{
    public function index(){
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
        $data = array_merge($this->mainData(),[
            'free_courses_name' => $free_courses_name,
        ]);
        return view('back.user.index',['data' => $data]);
    }
    public function singleCourse($id){
        $data = array_merge($this->mainData(),[

        ]);
        return view('back.user.index',['data' => $data]);
    }
}
