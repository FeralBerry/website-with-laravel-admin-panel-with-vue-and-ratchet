<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreeCoursesNameController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function postAdd(Request $request){
        $img_name = '';
        if ($request->hasFile('free_courses_name_img') && $request['free_courses_name_img'] !== NULL) {
            $image = $request->file('free_courses_name_img');
            $img_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/back/img/courses');
            $image->move($destinationPath, $img_name);
            $img_name = '/back/img/courses/'.$img_name;
        }
        DB::table('free_courses_name')
            ->insert([
                'title' => $request['free_courses_name_title'],
                'brief' => $request['free_courses_name_brief'],
                'img' => $img_name,
                'link' => $request['free_courses_name_link'],
            ]);
        $free_courses_name = DB::table('free_courses_name')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();
        $data = [
            'message' => 'Успешно добавлено название курса!',
            'free_courses_name' => $free_courses_name
        ];
        return $data;
    }
    public function getEdit($id){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function postEdit(Request $request,$id){
        $img_name = '';
        if ($request->hasFile('free_courses_name_img') && $request['free_courses_name_img'] !== NULL) {
            if ($request['free_courses_name_old_img'] !== '' && $request['free_courses_name_old_img'] !== NULL) {
                if (File_exists(public_path($request['free_courses_name_old_img']))) {
                    unlink(public_path($request['free_courses_name_old_img']));
                    $image = $request->file('free_courses_name_img');
                    $img_name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/back/img/courses');
                    $image->move($destinationPath, $img_name);
                    $img_name = '/back/img/courses/'.$img_name;
                } else {
                    $image = $request->file('free_courses_name_img');
                    $img_name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/back/img/courses');
                    $image->move($destinationPath, $img_name);
                    $img_name = '/back/img/courses/'.$img_name;
                }
            } else {
                $image = $request->file('free_courses_name_img');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/back/img/courses');
                $image->move($destinationPath, $img_name);
                $img_name = '/back/img/courses/'.$img_name;
            }
        } else {
            $img_name = $request['free_courses_name_old_img'];
        }
        DB::table('free_courses_name')
            ->where('id',$id)
            ->update([
                'title' => $request['free_courses_name_title'],
                'brief' => $request['free_courses_name_brief'],
                'img' => $img_name,
                'link' => $request['free_courses_name_link'],
            ]);
        $data = [
            'message' => 'Название курса успешно измененено!',
            'img' => $img_name
        ];
        return $data;
    }
    public function delete($id){

    }
    public function erase($id){
        $free_courses_name = DB::table('free_courses_name')
            ->where('id',$id)
            ->get();
        $img = '';
        foreach ($free_courses_name as $item){
            $img = $item->img;
        }
        if($img !== ''){
            if (file_exists(public_path().$img)) {
                unlink(public_path().$img);
            }
        }
        DB::table('free_courses_name')
            ->where('id',$id)
            ->delete();
    }
}
