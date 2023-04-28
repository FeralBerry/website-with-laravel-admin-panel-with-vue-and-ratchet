<?php
namespace App\Http\Controllers\Back\Admin\Socket;

use App\Http\Controllers\Back\BackController;
use Illuminate\Support\Facades\DB;

class BlogController extends BackController
{
    public function blog_index($command){
        $blog = DB::table('blog')
            ->get();
        $blog_tags = DB::table('blog_tags')
            ->get();
        foreach ($blog as $item => $value){
            $blog[$item]->description = strip_tags($blog[$item]->description);
            $blog_tags_con = DB::table('blog_tags_con')
                ->where('blog_id',$blog[$item]->id)
                ->get();
            $blog[$item]->tags_name = [];
            $blog[$item]->tags_icon = [];
            foreach ($blog_tags_con as $tag_con){
                foreach ($blog_tags as $tag){
                    if($tag->id == $tag_con->tag_id){
                        array_push($blog[$item]->tags_name,$tag->name);
                        array_push($blog[$item]->tags_icon,$tag->icon);
                    }
                }
            }
        }
        $data = [
            'message' => $command->command,
            'blog' => $blog
        ];
        return $data;
    }
}
