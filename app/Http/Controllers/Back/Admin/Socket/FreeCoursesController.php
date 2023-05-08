<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class FreeCoursesController extends BackController
{
    public function free_courses_index($command){
        $free_courses = DB::table('free_courses')
            ->get();
        $free_courses_name = DB::table('free_courses_name')
            ->get();
        $data = [
            'message' => $command->command,
            'free_courses' => $free_courses,
            'free_courses_name' => $free_courses_name
        ];
        return $data;
    }
    public function free_courses_name_index($command){
        $free_courses_name = DB::table('free_courses_name')
            ->get();
        $data = [
            'message' => $command->command,
            'free_courses_name' => $free_courses_name,
        ];
        return $data;
    }
}
