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
        if(Auth::user()){
            $auth = true;
            $auth_user_name = Auth::user()->name;
            $auth_user_id = Auth::user()->id;
        }
        $navigate = DB::table('navigate')
            ->get();
        $seo = DB::table('seo')
            ->get();
        $data = [
            'navigate' => $navigate,
            'seo' => $seo,
            'auth' => $auth,
            'user_name' => $auth_user_name,
            'auth_user_id' => $auth_user_id,
        ];
        return $data;
    }
}