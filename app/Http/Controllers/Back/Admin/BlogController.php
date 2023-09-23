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
        $blog = DB::table('blog')
            ->where('id',$id)
            ->get();
        $blog_tags_checked = DB::table('blog_tags_con')
            ->where('blog_id',$id)
            ->get();
        $blog_tags = DB::table('blog_tags')
            ->get();
        foreach ($blog_tags as $item => $value){
            $array = json_encode($blog_tags[$item]);
            $blog_tags[$item] = json_decode(str_replace('"}','","checked":"0"}',$array));
            foreach ($blog_tags_checked as $checked){
                if($blog_tags[$item]->id == $checked->tag_id){
                    $array = json_encode($blog_tags[$item]);
                    $blog_tags[$item] = json_decode(str_replace('"}','","checked":"1"}',$array));
                }
            }
        }
        $data = array_merge($this->adminData(),[
            'blog' => $blog,
            'blog_tags' => $blog_tags,
            'id' => $id
        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function blog_edit(Request $request,$id){
        $img_name = NULL;
        if ($request->hasFile('img') && $request['img'] !== NULL) {
            if ($request['old_img'] !== '' && $request['old_img'] !== NULL) {
                if (File_exists(public_path('/back/img/blog' . $request['old_img']))) {
                    unlink(public_path('/back/img/blog' . $request['old_img']));
                    $image = $request->file('img');
                    $img_name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/back/img/blog');
                    $image->move($destinationPath, $img_name);
                    $img_name = '/back/img/blog/'.$img_name;
                } else {
                    $image = $request->file('img');
                    $img_name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/back/img/blog');
                    $image->move($destinationPath, $img_name);
                    $img_name = '/back/img/blog/'.$img_name;
                }
            } else {
                $image = $request->file('img');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/back/img/blog');
                $image->move($destinationPath, $img_name);
                $img_name = '/back/img/blog/'.$img_name;
            }
        } else {
            $img_name = $request['old_img'];
        }
        DB::table('blog')
            ->where('id',$id)
            ->update([
                'img' => $img_name,
                'title' => $request['title'],
                'description' => $request['description'],
            ]);
        if($request['tags'] !== NULL){
            DB::table('blog_tags_con')
                ->where('blog_id',$id)
                ->delete();
            foreach ($request['tags'] as $item => $value){
                DB::table('blog_tags_con')
                    ->insert([
                        'blog_id' => $id,
                        'tag_id' => $value
                    ]);
            }
        } else {
            DB::table('blog_tags_con')
                ->where('blog_id',$id)
                ->delete();
        }
        DB::table('navigate')
            ->where('href','/blog/article/'.$id)
            ->update([
                'title' => $request['title'],
            ]);
        return redirect()->route('back-admin-blog-index');
    }
    public function delete($id){
        $blog = DB::table('blog')
            ->where('id',$id)
            ->get();
        $img = '';
        foreach ($blog as $item){
            $img = $item->img;
        }
        if($img !== NULL){
            if (file_exists(public_path().$img)) {
                unlink(public_path().$img);
            }
        }
        DB::table('blog')
            ->where('id',$id)
            ->delete();
        DB::table('blog_tags_con')
            ->where('blog_id',$id)
            ->delete();
        DB::table('navigate')
            ->where('href','/blog/article/'.$id)
            ->delete();
        return redirect()->route('back-admin-blog-index');
    }

    public function tags(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function tagsAdd(Request $request){
        DB::table('blog_tags')
            ->insert([
                'name' => $request['tag_name'],
                'icon' => $request['icon'],
            ]);
        $tag = DB::table('blog_tags')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();
        $data = [
            'tag' => $tag,
        ];
        return $data;
    }
    public function tagsEdit(Request $request,$id){
        DB::table('blog_tags')
            ->where('id',$id)
            ->update([
                'name' => $request['name'],
                'icon' => $request['icon'],
            ]);
        return $request['name'];
    }
    public function tagsDelete($id){
        DB::table('blog_tags')
            ->where('id',$id)
            ->delete();
    }
}
