<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class FreeCoursesController extends BackController
{
    public function free_courses_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function free_courses_add($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function free_courses_edit($command){
        $data = [
            'message' => $command->command
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
