<?php
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackController extends Controller
{
    protected function mainData(){
        $auth = false;
        $auth_user_name = '';
        $auth_user_id = '';
        if(Auth::user()){
            $auth = true;
            $auth_user_name = Auth::user()->name;
            $auth_user_id = Auth::user()->id;
        }
        $data = [
            'auth' => $auth,
            'user_name' => $auth_user_name,
            'auth_user_id' => $auth_user_id,
        ];
        return $data;
    }
}
