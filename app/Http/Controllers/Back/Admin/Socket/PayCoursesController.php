<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class PayCoursesController extends BackController
{
    public function pay_courses_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function pay_courses_add($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
    public function pay_courses_edit($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
}
