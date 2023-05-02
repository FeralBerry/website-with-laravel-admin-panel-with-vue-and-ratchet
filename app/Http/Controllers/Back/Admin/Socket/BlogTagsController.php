<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class BlogTagsController extends BackController
{
    public function blog_tags_index($command){
        $blog_tags = DB::table('blog_tags')
            ->get();
        $data = [
            'message' => $command->command,
            'blog_tags' => $blog_tags,
        ];
        return $data;
    }
}
