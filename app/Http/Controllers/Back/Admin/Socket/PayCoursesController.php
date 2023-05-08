<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class PayCoursesController extends BackController
{
    public function pay_courses_index($command){
        $pay_courses = DB::table('pay_courses')
            ->get();
        $pay_courses_name = DB::table('pay_courses_name')
            ->get();
        $data = [
            'message' => $command->command,
            'pay_courses' => $pay_courses,
            'pay_courses_name' => $pay_courses_name
        ];
        return $data;
    }
    public function pay_courses_name_index($command){
        $pay_courses_name = DB::table('pay_courses_name')
            ->get();
        $data = [
            'message' => $command->command,
            'pay_courses_name' => $pay_courses_name,
        ];
        return $data;
    }
}
