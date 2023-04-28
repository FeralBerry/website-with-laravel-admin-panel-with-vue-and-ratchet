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
}
