<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayCoursesController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function getEdit($id){
        $pay_courses = DB::table('pay_courses')
            ->where('id',$id)
            ->get();
        $pay_courses_name = DB::table('pay_courses_name')
            ->get();
        $data = array_merge($this->adminData(),[
            'pay_courses' => $pay_courses,
            'pay_courses_name' => $pay_courses_name,
        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function postEdit(Request $request,$id){
        $video_name = '';
        if ($request->hasFile('video') && $request['video'] !== NULL) {
            if ($request['old_link'] !== '' && $request['old_link'] !== NULL) {
                if (File_exists(public_path('/back/video/pay/' . $request['old_link']))) {
                    unlink(public_path('/back/video/pay/' . $request['old_link']));
                    $video = $request->file('video');
                    $video_name = time() . '.' . $video->getClientOriginalExtension();
                    $destinationPath = public_path('/back/video/pay');
                    $video->move($destinationPath, $video_name);
                    $video_name = '/back/video/pay/'.$video_name;
                } else {
                    $video = $request->file('video');
                    $video_name = time() . '.' . $video->getClientOriginalExtension();
                    $destinationPath = public_path('/back/video/pay/');
                    $video->move($destinationPath, $video_name);
                    $video_name = '/back/video/pay/'.$video_name;
                }
            } else {
                $video = $request->file('video');
                $video_name = time() . '.' . $video->getClientOriginalExtension();
                $destinationPath = public_path('/back/video/pay/');
                $video->move($destinationPath, $video_name);
                $video_name = '/back/video/pay/'.$video_name;
            }
        } else {
            $video_name = $request['old_link'];
        }
        $material_name = '';
        if ($request->hasFile('material') && $request['material'] !== NULL) {
            if ($request['old_material'] !== '' && $request['old_material'] !== NULL) {
                if (File_exists(public_path('/back/materials/pay/' . $request['old_material']))) {
                    unlink(public_path('/back/materials/pay/' . $request['old_material']));
                    $material = $request->file('material');
                    $material_name = time() . '.' . $material->getClientOriginalExtension();
                    $destinationPath = public_path('/back/materials/pay');
                    $material->move($destinationPath, $material_name);
                    $material_name = '/back/materials/pay/'.$material_name;
                } else {
                    $material = $request->file('material');
                    $material_name = time() . '.' . $material->getClientOriginalExtension();
                    $destinationPath = public_path('/back/materials/pay/');
                    $material->move($destinationPath, $material_name);
                    $material_name = '/back/materials/pay/'.$material_name;
                }
            } else {
                $material = $request->file('material');
                $material_name = time() . '.' . $material->getClientOriginalExtension();
                $destinationPath = public_path('/back/materials/pay/');
                $material->move($destinationPath, $material_name);
                $material_name = '/back/materials/pay/'.$material_name;
            }
        } else {
            $material_name = $request['old_material'];
        }
        $last_lesson_name = '';
        if ($request->hasFile('last_lesson') && $request['last_lesson'] !== NULL) {
            if ($request['old_last_lesson'] !== '' && $request['old_last_lesson'] !== NULL) {
                if (File_exists(public_path('/back/lesson/pay/' . $request['old_last_lesson']))) {
                    unlink(public_path('/back/lesson/pay/' . $request['old_last_lesson']));
                    $last_lesson = $request->file('last_lesson');
                    $last_lesson_name = time() . '.' . $last_lesson->getClientOriginalExtension();
                    $destinationPath = public_path('/back/lesson/free');
                    $last_lesson->move($destinationPath, $last_lesson_name);
                    $last_lesson_name = '/back/lesson/pay/'.$last_lesson_name;
                } else {
                    $last_lesson = $request->file('last_lesson');
                    $last_lesson_name = time() . '.' . $last_lesson->getClientOriginalExtension();
                    $destinationPath = public_path('/back/lesson/pay/');
                    $last_lesson->move($destinationPath, $last_lesson_name);
                    $last_lesson_name = '/back/lesson/pay/'.$last_lesson_name;
                }
            } else {
                $last_lesson = $request->file('last_lesson');
                $last_lesson_name = time() . '.' . $last_lesson->getClientOriginalExtension();
                $destinationPath = public_path('/back/lesson/pay/');
                $last_lesson->move($destinationPath, $last_lesson_name);
                $last_lesson_name = '/back/lesson/pay/'.$last_lesson_name;
            }
        } else {
            $last_lesson_name = $request['old_last_lesson'];
        }
        DB::table('pay_courses')
            ->where('id',$id)
            ->update([
                'title' => $request['title'],
                'description' => $request['description'],
                'free_courses_name_id' => $request['free_courses_name'],
                'link' => $video_name,
                'youtube' => $request['video_youtube'],
                'type' => $request['free_courses_type_radio'],
                'task' => $request['task'],
                'example' => $request['example'],
                'material' => $material_name,
                'last_lesson' => $last_lesson_name,
            ]);
        return redirect()->route('back-admin-pay-courses-index');
    }
    public function delete($id){
        $free_courses = DB::table('pay_courses')
            ->where('id',$id)
            ->get();
        foreach ($free_courses as $item){
            if (File_exists(public_path($item->link))){
                unlink(public_path($item->link));
            }
            if (File_exists(public_path($item->material))){
                unlink(public_path($item->material));
            }
            if(File_exists(public_path($item->last_lesson))) {
                unlink(public_path($item->last_lesson));
            }
        }
        DB::table('pay_courses')
            ->where('id',$id)
            ->delete();
        return redirect()->route('back-admin-pay-courses-index');
    }
    public function getAdd(){
        $pay_courses_name = DB::table('pay_courses_name')
            ->get();
        $data = array_merge($this->adminData(),[
            'pay_courses_name' => $pay_courses_name,
        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function postAdd(Request $request){
        $video_name = '';
        if ($request->hasFile('video') && $request['video'] !== NULL) {
            $video = $request->file('video');
            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/back/video/pay/');
            $video->move($destinationPath, $video_name);
            $video_name = '/back/video/pay/'.$video_name;
        }
        $material_name = '';
        if ($request->hasFile('material') && $request['material'] !== NULL) {
            $material = $request->file('material');
            $material_name = time() . '.' . $material->getClientOriginalExtension();
            $destinationPath = public_path('/back/materials/pay/');
            $material->move($destinationPath, $material_name);
            $material_name = '/back/materials/pay/'.$material_name;
        }
        $last_lesson_name = '';
        if ($request->hasFile('last_lesson') && $request['last_lesson'] !== NULL) {
            $material = $request->file('last_lesson');
            $last_lesson_name = time() . '.' . $material->getClientOriginalExtension();
            $destinationPath = public_path('/back/lesson/pay/');
            $material->move($destinationPath, $last_lesson_name);
            $last_lesson_name = '/back/lesson/pay/'.$last_lesson_name;
        }
        DB::table('pay_courses')
            ->insert([
                'title' => $request['title'],
                'description' => $request['description'],
                'free_courses_name_id' => $request['pay_courses_name'],
                'link' => $video_name,
                'youtube' => $request['video_youtube'],
                'type' => $request['pay_courses_type_radio'],
                'task' => $request['task'],
                'example' => $request['example'],
                'material' => $material_name,
                'last_lesson' => $last_lesson_name,
            ]);
        return redirect()->route('back-admin-pay-courses-index');
    }
}
