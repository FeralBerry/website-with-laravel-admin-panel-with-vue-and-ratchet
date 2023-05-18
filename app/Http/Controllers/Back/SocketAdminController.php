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
        $contact = DB::table('contact')
            ->get();
        $data = [
            'message' => $command->command,
            'contact' => $contact
        ];
        return $data;
    }
    public function seo_index($command){
        $seo = DB::table('seo')
            ->get();
        $data = [
            'message' => $command->command,
            'seo' => $seo
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
    public function question_index($command){
        $question = DB::table('contact_form')
            ->get();
        $footer_message = DB::table('footer_message')
            ->get();
        $data = [
            'message' => $command->command,
            'question' => $question,
            'footer_message' => $footer_message
        ];
        return $data;
    }
}
