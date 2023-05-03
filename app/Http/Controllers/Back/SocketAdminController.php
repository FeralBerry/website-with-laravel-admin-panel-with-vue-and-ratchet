<?php
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SocketAdminController extends Controller
{
    public function index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function slider_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function faq_slider_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function navigate_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function contact_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function seo_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function users_index($command){
        $users = DB::table('users')
            ->select([
                'name',
                'email',
                'avatar',
                'role',
                'bought_courses_id',
                'last_open_free_course_id',
                'last_open_pay_course_id',
                'connection_id',
            ])
            ->get();
        $data = [
            'message' => $command->command,
            'users' => $users
        ];
        return $data;
    }
}
