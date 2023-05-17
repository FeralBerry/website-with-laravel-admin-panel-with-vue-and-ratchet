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
        $video_name = '';
        if ($request->hasFile('video') && $request['video'] !== NULL) {
            if ($request['old_link'] !== '' && $request['old_link'] !== NULL) {
                if (File_exists(public_path('/back/video/free/' . $request['old_link']))) {
                    unlink(public_path('/back/video/free/' . $request['old_link']));
                    $video = $request->file('video');
                    $video_name = time() . '.' . $video->getClientOriginalExtension();
                    $destinationPath = public_path('/back/video/free');
                    $video->move($destinationPath, $video_name);
                    $video_name = '/back/video/free/'.$video_name;
                } else {
                    $video = $request->file('video');
                    $video_name = time() . '.' . $video->getClientOriginalExtension();
                    $destinationPath = public_path('/back/video/free/');
                    $video->move($destinationPath, $video_name);
                    $video_name = '/back/video/free/'.$video_name;
                }
            } else {
                $video = $request->file('video');
                $video_name = time() . '.' . $video->getClientOriginalExtension();
                $destinationPath = public_path('/back/video/free/');
                $video->move($destinationPath, $video_name);
                $video_name = '/back/video/free/'.$video_name;
            }
        } else {
            $video_name = $request['old_link'];
        }
        $material_name = '';
        if ($request->hasFile('material') && $request['material'] !== NULL) {
            if ($request['old_material'] !== '' && $request['old_material'] !== NULL) {
                if (File_exists(public_path('/back/materials/free/' . $request['old_material']))) {
                    unlink(public_path('/back/materials/free/' . $request['old_material']));
                    $material = $request->file('material');
                    $material_name = time() . '.' . $material->getClientOriginalExtension();
                    $destinationPath = public_path('/back/materials/free');
                    $material->move($destinationPath, $material_name);
                    $material_name = '/back/materials/free/'.$material_name;
                } else {
                    $material = $request->file('material');
                    $material_name = time() . '.' . $material->getClientOriginalExtension();
                    $destinationPath = public_path('/back/materials/free/');
                    $material->move($destinationPath, $material_name);
                    $material_name = '/back/materials/free/'.$material_name;
                }
            } else {
                $material = $request->file('material');
                $material_name = time() . '.' . $material->getClientOriginalExtension();
                $destinationPath = public_path('/back/materials/free/');
                $material->move($destinationPath, $material_name);
                $material_name = '/back/materials/free/'.$material_name;
            }
        } else {
            $material_name = $request['old_material'];
        }
        DB::table('free_courses')
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
            ]);
        return redirect()->route('back-admin-free-courses-index');
    }
    public function delete($id){
        $free_courses = DB::table('free_courses')
            ->where('id',$id)
            ->get();
        foreach ($free_courses as $item){
            if (File_exists(public_path($item->link))){
                unlink(public_path($item->link));
            }
            if (File_exists(public_path($item->material))){
                unlink(public_path($item->material));
            }
        }
        DB::table('free_courses')
            ->where('id',$id)
            ->delete();
        return redirect()->route('back-admin-free-courses-index');
    }
    public function getAdd(){
        $free_courses_name = DB::table('free_courses_name')
            ->get();
        $data = array_merge($this->adminData(),[
            'free_courses_name' => $free_courses_name,
        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function postAdd(Request $request){
        $video_name = '';
        if ($request->hasFile('video') && $request['video'] !== NULL) {
            $video = $request->file('video');
            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/back/video/free/');
            $video->move($destinationPath, $video_name);
            $video_name = '/back/video/free/'.$video_name;
        }
        $material_name = '';
        if ($request->hasFile('material') && $request['material'] !== NULL) {
            $material = $request->file('material');
            $material_name = time() . '.' . $material->getClientOriginalExtension();
            $destinationPath = public_path('/back/materials/free/');
            $material->move($destinationPath, $material_name);
            $material_name = '/back/materials/free/'.$material_name;
        }
        DB::table('free_courses')
            ->insert([
                'title' => $request['title'],
                'description' => $request['description'],
                'free_courses_name_id' => $request['free_courses_name'],
                'link' => $video_name,
                'youtube' => $request['video_youtube'],
                'type' => $request['free_courses_type_radio'],
                'task' => $request['task'],
                'example' => $request['example'],
                'material' => $material_name,
            ]);
        return redirect()->route('back-admin-free-courses-index');
    }
}
