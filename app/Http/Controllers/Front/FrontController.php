<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    protected function data(){
        $auth = false;
        $auth_user_name = '';
        $auth_user_id = '';
        $auth_user_avatar = '';
        if(Auth::user()){
            $auth = true;
            $auth_user_name = Auth::user()->name;
            $auth_user_id = Auth::user()->id;
            $auth_user_avatar = Auth::user()->avatar;
        }
        $navigate = DB::table('navigate')
            ->get();
        $seo = DB::table('seo')
            ->get();
        $footer_blog = DB::table('blog')
            ->orderByDesc('created_at')
            ->take(2)
            ->get();
        $quotes_footer = DB::table('quotes_footer')
            ->inRandomOrder()
            ->limit(1)
            ->get();
        $data = [
            'navigate' => $navigate,
            'seo' => $seo,
            'auth' => $auth,
            'user_name' => $auth_user_name,
            'auth_user_id' => $auth_user_id,
            'auth_user_avatar' => $auth_user_avatar,
            'footer_blog' => $footer_blog,
            'quotes_footer' => $quotes_footer,
        ];
        return $data;
    }
}
