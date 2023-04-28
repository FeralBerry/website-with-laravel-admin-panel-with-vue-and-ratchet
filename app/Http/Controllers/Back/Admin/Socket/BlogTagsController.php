<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class BlogTagsController extends BackController
{
    public function blog_tags_index($command){
        $data = [
            'message' => $command->command
        ];
        return $data;
    }
}
