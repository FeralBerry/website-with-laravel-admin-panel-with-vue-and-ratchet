<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function add(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function blog_add(Request $request){
        $img_name = NULL;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $img_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('back/img/blog');
            $image->move($destinationPath, $img_name);
        }
        if($img_name !== NULL){
            $img_name = 'back/img/blog/'.$img_name;
        }
        DB::table('blog')
            ->insert([
                'img' => $img_name,
                'title' => $request['title'],
                'description' => $request['description'],
            ]);
        $blog = DB::table('blog')
            ->orderBy('created_at')
            ->select('id')
            ->get(1);
        foreach ($blog as $item){
            $blog_id = $item->id;
        }
        if($request['tags'] !== NULL){
            foreach ($request['tags'] as $item => $value){
                DB::table('blog_tags_con')
                    ->insert([
                        'blog_id' => $blog_id,
                        'tag_id' => $value
                    ]);
            }
        }
        $navigate = DB::table('navigate')
            ->where('menu','=',2)
            ->get();
        $count_navigate = count($navigate);
        if($count_navigate > 6){
            $navigate = DB::table('navigate')
                ->where('menu',2)
                ->orderBy('created_at')
                ->limit(1)
                ->get();
            foreach ($navigate as $item){
                DB::table('navigate')
                    ->where('id',$item->id)
                    ->delete();
            }
            DB::table('navigate')
                ->insert([
                    'menu' => 2,
                    'submenu' => 2,
                    'title' => $request['title'],
                    'href' => '/blog/article/'.$blog_id,
                ]);
        } else {
            DB::table('navigate')
                ->insert([
                    'menu' => 2,
                    'submenu' => 2,
                    'title' => $request['title'],
                    'href' => '/blog/article/'.$blog_id,
                ]);
        }
        return redirect()->back();
    }
    public function edit($id){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function blog_edit(Request $request,$id){
        if ($request->hasFile('img')) {
            if ($request['old_img'] !== '' && $request['old_img'] !== NULL) {
                if (File_exists(public_path('front/img/gallery' . $request['old_img']))) {
                    unlink(public_path('front/img/gallery' . $request['old_img']));
                    $image = $request->file('img');
                    $img_name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('front/img/gallery');
                    $image->move($destinationPath, $img_name);
                } else {
                    $image = $request->file('img');
                    $img_name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('front/img/gallery');
                    $image->move($destinationPath, $img_name);
                }
            } else {
                $image = $request->file('img');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('front/img/gallery');
                $image->move($destinationPath, $img_name);
            }
        } else {
            $img_name = $request['old_img'];
        }
    }
    public function delete($id){
        $blog = DB::table('blog')
            ->where('id',$id)
            ->get();
        $img = '';
        foreach ($blog as $item){
            $img = $item->img;
        }
        if (file_exists(public_path().$img)) {
            unlink(public_path().$img);
        }
        $blog = DB::table('blog')
            ->where('id',$id)
            ->delete();
    }
    public function tags(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function tagsEdit(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
}
