<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function seo(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function seoAdd(Request $request){
        DB::table('seo')
            ->insert([
                'url' => $request['url'],
                'title' => $request['title'],
                'description' => $request['description'],
                'keywords' => $request['keywords'],
            ]);
        $seo = DB::table('seo')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();
        $data = [
            'seo' => $seo
        ];
        return $data;
    }
    public function seoEdit(Request $request,$id){
        DB::table('seo')
            ->where('id',$id)
            ->update([
                'url' => $request['url'],
                'title' => $request['title'],
                'description' => $request['description'],
                'keywords' => $request['keywords'],
            ]);
        return 'SEO успешно изменено!';
    }
    public function seoDelete($id){
        DB::table('seo')
            ->where('id',$id)
            ->delete();
    }
    public function navigate(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function contact(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function contactEdit(Request $request,$name){
        if($name == 'phone'){
            DB::table('contact')
                ->update([
                    'phone' => $request['example']
                ]);
            return 'Телефон успешно изменен!';
        } elseif($name == 'email'){
            DB::table('contact')
                ->update([
                    'email' => $request['example']
                ]);
            return 'E-mail успешно изменен!';
        } elseif($name == 'second_email'){
            DB::table('contact')
                ->update([
                    'second_email' => $request['example']
                ]);
            return 'Второй E-mail успешно изменен!';
        } elseif($name == 'whatsapp'){
            DB::table('contact')
                ->update([
                    'whatsapp' => $request['example']
                ]);
            return 'WhatsApp успешно изменен!';
        } elseif($name == 'telegram'){
            DB::table('contact')
                ->update([
                    'telegram' => $request['example']
                ]);
            return 'Telegram успешно изменен!';
        } elseif($name == 'vk'){
            DB::table('contact')
                ->update([
                    'vk' => $request['example']
                ]);
            return 'Вконтакте успешно изменено!';
        } elseif($name == 'git'){
            DB::table('contact')
                ->update([
                    'git' => $request['example']
                ]);
            return 'GIT успешно изменен!';
        } elseif($name == 'instagram'){
            DB::table('contact')
                ->update([
                    'instagram' => $request['example']
                ]);
            return 'Instagram успешно изменен!';
        } elseif($name == 'twitter'){
            DB::table('contact')
                ->update([
                    'twitter' => $request['example']
                ]);
            return 'Twitter успешно изменен!';
        } elseif($name == 'youtube'){
            DB::table('contact')
                ->update([
                    'youtube' => $request['example']
                ]);
            return 'Youtube успешно изменен!';
        }
    }
    public function users(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function user_question(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
}
