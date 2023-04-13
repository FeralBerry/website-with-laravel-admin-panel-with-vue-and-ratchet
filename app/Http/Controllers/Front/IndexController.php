<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IndexController extends FrontController
{
    public function index(){
        $free_courses = DB::table('free_courses')
            ->select('id')
            ->get();
        $free_courses_type = DB::table('free_courses')
            ->where('type',1)
            ->select('type')
            ->get();
        $free_courses_video = DB::table('free_courses')
            ->where('link','!=',NULL)
            ->orWhere('youtube','!=',NULL)
            ->select('id')
            ->get();
        $pay_courses = DB::table('pay_courses')
            ->select('id')
            ->get();
        $pay_courses_type = DB::table('pay_courses')
            ->where('type',1)
            ->select('type')
            ->get();
        $pay_courses_video = DB::table('pay_courses')
            ->where('link','!=',NULL)
            ->orWhere('youtube','!=',NULL)
            ->select('id')
            ->get();
        $count_all_courses = count($free_courses) + count($pay_courses);
        $count_task_all_courses = count($free_courses_type) + count($pay_courses_type);
        $count_video_all_courses = count($free_courses_video) + count($pay_courses_video);
        $users = DB::table('users')
            ->select('id')
            ->get();
        $count_users = count($users);
        $slider = DB::table('slider')
            ->get();
        $data = array_merge($this->data(),[
            'count_all_courses' => $count_all_courses,
            'count_task_all_courses' => $count_task_all_courses,
            'count_video_all_courses' => $count_video_all_courses,
            'count_users' => $count_users,
            'slider' => $slider,
        ]);
        return view('front.index',['data' => $data]);
    }
    public function contact(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shop($id = null){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shopProducts(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shopProduct(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function cart(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function checkout(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function blog(){
        $blog = DB::table('blog')
            ->paginate(12);
        $data = array_merge($this->data(),[
            'blog' => $blog
        ]);
        return view('front.index',['data' => $data]);
    }
    public function blogArticle($id){
        $blog = DB::table('blog')
            ->where('id',$id);
        $data = array_merge($this->data(),[
            'blog' => $blog
        ]);
        return view('front.index',['data' => $data]);
    }
    public function blogSearch($search){
        $blog = DB::table('blog')
            ->where('title','LIKE',"%".$search."%")
            ->paginate(12);
        $data = [
            'blog_search' => $blog
        ];
        return $data;
    }
    public function shopSearch(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }

}
