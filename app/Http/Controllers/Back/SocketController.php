<?php
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SocketController extends Controller
{
    public function connection($from,$command){

    }
    public function cart(){
        $users_cart = DB::table('users_cart')
            ->where('cookie_id',$_COOKIE['cookie_id'])
            ->join('shop','shop.id','=','users_cart.shop_id')
            ->get();
        $cart_price_with_percent = 0;
        $cart_price = 0;
        foreach ($users_cart as $item){
            $cart_price_with_percent += floor($item->count * (($item->price + $item->sub_price/100) - ($item->percent / 100) * $item->count * ($item->price + $item->sub_price/100))* 100) / 100;
            $cart_price += $item->count * (($item->price + $item->sub_price/100));
        }
        $data = [
            'users_cart' => $users_cart->take(5),
            'cart_price' => round($cart_price,2),
            'cart_price_with_percent' => round($cart_price_with_percent,2),
            'cookie_id' => $_COOKIE['cookie_id'],
        ];
        return $data;
    }
    public function connect($command){
        $data = array_merge($this->cart(),[
            'message' => 'new_connect',
            'user_id' => $command->user_id,
        ]);
        return $data;
    }
    public function open_course($command){
        $free_courses = DB::table('free_courses')
            ->where('free_courses_name_id',$command->course)
            ->where('id',$command->course_id)
            ->get();
        DB::table('users')
            ->where('id',$command->user_id)
            ->update([
                'last_open_free_course_id' => $command->course_id
            ]);
        $data = array_merge($this->cart(),[
            'message' => 'open_course',
            'free_courses' => $free_courses,
        ]);
        return $data;
    }
    public function open_free_courses(){
        $free_courses_name = DB::table('free_courses_name')
            ->get();
        foreach ($free_courses_name as $courses_name => $value){
            $free_courses = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->get();
            $free_courses_tasks = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->where('type',1)
                ->get();
            $free_courses_lessons = DB::table('free_courses')
                ->where('free_courses_name_id',$free_courses_name[$courses_name]->id)
                ->where('type',0)
                ->get();
            $array = json_encode($free_courses_name[$courses_name]);
            $array = json_decode(str_replace('"}','","count_article":"'.count($free_courses).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_tasks":"'.count($free_courses_tasks).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_lessons":"'.count($free_courses_lessons).'"}',$array));
            $free_courses_name[$courses_name] = $array;
        }
        $data = array_merge($this->cart(),[
            'message' => 'open_free_courses',
            'free_courses_name' => $free_courses_name
        ]);
        return $data;
    }
    public function open_pay_courses($command){
        $user = DB::table('users')
            ->where('id',$command->user_id)
            ->get();
        foreach ($user as $item){
            $bought_courses_id = $item->bought_courses_id;
        }
        $courses_id = explode(';',$bought_courses_id);
        $pay_courses_name = [];
        foreach ($courses_id as $id){
            $array = DB::table('pay_courses_name')
                ->where('id',$id)
                ->get();
            $pay_courses_name[] = $array;
        }
        foreach ($pay_courses_name as $courses_name => $value){
            foreach ($value as $item){
                $pay_courses = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->get();
                $pay_courses_tasks = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->where('type',1)
                    ->get();
                $pay_courses_lessons = DB::table('pay_courses')
                    ->where('pay_courses_name_id',$item->id)
                    ->where('type',0)
                    ->get();
                $array = json_encode($value);
                $array = json_decode(str_replace('"}','","count_article":"'.count($pay_courses).'"}',$array));
                $array = json_encode($array);
                $array = json_decode(str_replace('"}','","count_tasks":"'.count($pay_courses_tasks).'"}',$array));
                $array = json_encode($array);
                $array = json_decode(str_replace('"}','","count_lessons":"'.count($pay_courses_lessons).'"}',$array));
                $pay_courses_name[$courses_name] = $array;
            }
        }
        $data = array_merge($this->cart(),[
            'message' => 'open_pay_courses',
            'pay_courses_name' => $pay_courses_name
        ]);
        return $data;
    }
    public function open_buy_courses($command){
        $buy_courses_name = DB::table('buy_courses')
            ->get();
        foreach ($buy_courses_name as $courses_name => $value){
            $pay_courses = DB::table('pay_courses')
                ->where('pay_courses_name_id',$value->pay_courses_name_id)
                ->get();
            $pay_courses_tasks = DB::table('pay_courses')
                ->where('pay_courses_name_id',$value->pay_courses_name_id)
                ->where('type',1)
                ->get();
            $pay_courses_lessons = DB::table('pay_courses')
                ->where('pay_courses_name_id',$value->pay_courses_name_id)
                ->where('type',0)
                ->get();
            $array = json_encode($value);
            $array = json_decode(str_replace('"}','","count_article":"'.count($pay_courses).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_tasks":"'.count($pay_courses_tasks).'"}',$array));
            $array = json_encode($array);
            $array = json_decode(str_replace('"}','","count_lessons":"'.count($pay_courses_lessons).'"}',$array));
            $buy_courses_name[$courses_name] = $array;
        }
        $data = array_merge($this->cart(),[
            'message' => 'open_buy_courses',
            'buy_courses_name' => $buy_courses_name
        ]);
        return $data;
    }
    public function front_footer_message($command){
        if (strlen($command->footer_name)>255 || strlen($command->footer_name)<3) {
            $data = [
                'message' => 'footer_name_error',
            ];
        }elseif (strlen($command->footer_phone)>50 || strlen($command->footer_phone)<3) {
            $data = [
                'message' => 'footer_phone_error',
            ];
        }elseif (strlen($command->footer_message)<3) {
            $data = [
                'message' => 'footer_message_error',
            ];
        } else {
            DB::table('footer_message')
                ->insert([
                    'name' => $command->footer_name,
                    'phone' => $command->footer_phone,
                    'message' => $command->footer_message,
                ]);
            $data = [
                'message' => 'footer_success',
            ];
        }
        return $data;
    }
    public function front_blog($command){
        $seo = DB::table('seo')
            ->where('url',$command->url)
            ->get();
        $blog = DB::table('blog')
            ->paginate(12);
        $data = array_merge($this->cart(),[
            'seo' => $seo,
            'blog' => $blog,
            'message' => 'front_blog'
        ]);
        return $data;
    }
    public function front_blog_article($command){
        $url = explode('?',$command->url);
        $url = explode('/',$url[0]);
        $seo = [];
        $blog = DB::table('blog')
            ->where('id',$url[3])
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
        foreach ($blog as $item){
            $seo['title'] = $item->title;
            $seo['description'] = Str::limit(strip_tags($item->description),150,'...');
        }
        $comments = DB::table('blog_comments')
            ->where('blog_id',$url[3])
            ->join('users','blog_comments.user_id','=','users.id')
            ->select(
                'name',
                'avatar',
                'description',
                'blog_comments.created_at'
            )
            ->paginate(20);
        $count_comments = count($comments);
        $last_news = DB::table('blog')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();
        $data = array_merge($this->cart(),[
            'seo' => $seo,
            'blog' => $blog,
            'comments' => $comments,
            'count_comments' => $count_comments,
            'last_news' => $last_news,
            'message' => 'front_blog_article'
        ]);
        return $data;
    }
    public function blog_comment_add($command){
        $message = strip_tags($command->message);
        DB::table('blog_comments')
            ->insert([
                'user_id' => $command->user_id,
                'description' => $message,
                'blog_id' => $command->blog_id,
            ]);
        $comments = DB::table('blog_comments')
            ->where('blog_id',$command->blog_id)
            ->join('users','blog_comments.user_id','=','users.id')
            ->select(
                'name',
                'avatar',
                'description',
                'blog_comments.created_at'
            )
            ->paginate(20);
        $count_comments = count($comments);
        $blog_tags = DB::table('blog_tags')
            ->get();
        $data = [
            'message' => 'blog_comment_add',
            'comments' => $comments,
            'count_comments' => $count_comments,
            'blog_tags' => $blog_tags,
        ];
        return $data;
    }
    public function front_shop($command){
        if($command->url == '/shop'){
            $shop = DB::table('shop')
                ->paginate(18);
            $seo = DB::table('seo')
                ->where('url','/shop')
                ->get();
            foreach ($seo as $item){
                $seo['title'] = $item->title;
                $seo['description'] = Str::limit(strip_tags($item->description),150,'...');
            }
        } else {
            $url = preg_replace('/[^0-9]/', '', $command->url);
            $shop = DB::table('shop')
                ->where('category', $url)
                ->paginate(18);
            $seo = DB::table('seo')
                ->where('url','/shop/'.$url)
                ->get();
            foreach ($seo as $item){
                $seo['title'] = $item->title;
                $seo['description'] = Str::limit(strip_tags($item->description),150,'...');
            }
        }

        $navigate = DB::table('navigate')
            ->get();
        $data = array_merge($this->cart(),[
            'message' => 'front_shop',
            'shop' => $shop,
            'seo' => $seo,
            'navigate' => $navigate,
        ]);
        return $data;
    }
    public function add_to_cart($command){
        $product_id = str_replace('cart_','',$command->product_id);
        $cart = DB::table('users_cart')
            ->where('cookie_id',$_COOKIE['cookie_id'])
            ->where('shop_id',$product_id)
            ->get();
        if($cart){
            $count_items = 0;
            foreach ($cart as $item){
                $count_items = $item->count + 1;
            }
            if($count_items > 0){
                DB::table('users_cart')
                    ->where('cookie_id',$_COOKIE['cookie_id'])
                    ->where('shop_id',$product_id)
                    ->update([
                        'cookie_id' => $_COOKIE['cookie_id'],
                        'shop_id' => $product_id,
                        'user_id' => $command->user_id,
                        'count' => $count_items
                    ]);
            } else {
                DB::table('users_cart')
                    ->insert([
                        'cookie_id' => $_COOKIE['cookie_id'],
                        'shop_id' => $product_id,
                        'user_id' => $command->user_id,
                        'count' => 1
                    ]);
            }
        }
        $data = array_merge($this->cart(),[
            'message' => 'add_to_cart',
        ]);
        return $data;
    }
    public function front_index(){
        $free_courses = DB::table('free_courses')
            ->select('id')
            ->get();
        $free_courses_type = DB::table('free_courses')
            ->where('type',1)
            ->select('type')
            ->get();
        $free_courses_video = DB::table('free_courses')
            ->where('link','!=',NULL)
            ->orWhere('youtube','!=',NULL)
            ->select('id')
            ->get();
        $pay_courses = DB::table('pay_courses')
            ->select('id')
            ->get();
        $pay_courses_type = DB::table('pay_courses')
            ->where('type',1)
            ->select('type')
            ->get();
        $pay_courses_video = DB::table('pay_courses')
            ->where('link','!=',NULL)
            ->orWhere('youtube','!=',NULL)
            ->select('id')
            ->get();
        $count_all_courses = count($free_courses) + count($pay_courses);
        $count_task_all_courses = count($free_courses_type) + count($pay_courses_type);
        $count_video_all_courses = count($free_courses_video) + count($pay_courses_video);
        $users = DB::table('users')
            ->select('id')
            ->get();
        $count_users = count($users);
        $data = [
            'message' => 'front_index',
            'count_all_courses' => $count_all_courses,
            'count_task_all_courses' => $count_task_all_courses,
            'count_video_all_courses' => $count_video_all_courses,
            'count_users' => $count_users,
        ];
        return $data;
    }
    public function front_cart(){
        $data = array_merge($this->cart(),[
            'message' => 'front_cart',
        ]);
        return $data;
    }
    public function shop_rating($command){
        $user_id = $command->user_id;
        $rate = $command->rating;
        $shop_id = $command->shop_id;
        $rating = DB::table('shop_rating')
            ->where('user_id',$user_id)
            ->where('shop_id',$shop_id)
            ->get();
        $next = 0;
        foreach ($rating as $item){
            $next++;
        }
        if($next > 0){
            DB::table('shop_rating')
                ->where('user_id',$user_id)
                ->where('shop_id',$shop_id)
                ->update([
                    'count' => $rate
                ]);
        } else {
            DB::table('shop_rating')
                ->insert([
                    'count' => $rate,
                    'user_id' => $user_id,
                    'shop_id' => $shop_id,
                ]);
        }
        $shop_rating = DB::table('shop_rating')
            ->where('shop_id',$shop_id)
            ->select('count')
            ->get();
        $count_shop_rating = count($shop_rating);
        $shop_count = 0;
        $rating = 0;
        if($shop_rating){
            foreach ($shop_rating as $item){
                $shop_count += $item->count;
            }
        }
        if($count_shop_rating !== 0){
            $rating = round($shop_count / $count_shop_rating,2);
        }
        DB::table('shop')
            ->where('id', $shop_id)
            ->update([
                'rating' => $rating
            ]);
        $rating = $rating*100/5;
        $data = [
            'message' => 'new_shop_rating',
            'rating' => $rating,
            'shop_id' => $shop_id,
        ];
        return $data;
    }
    public function shop_search($command){
        $shop_search = DB::table('shop')
            ->where('name','LIKE',"%$command->shop_search_input%")
            ->orWhere('description','LIKE',"%$command->shop_search_input%")
            ->paginate(18);
        $data = [
            'message' => 'shop_search',
            'shop_search' => $shop_search
        ];
        return $data;
    }
    public function blog_search($command){
        $blog_search = DB::table('blog')
            ->where('title','LIKE',"%$command->blog_search_input%")
            ->paginate(18);
        $data = [
            'message' => 'blog_search',
            'blog_search' => $blog_search
        ];
        return $data;
    }
    public function contact_form_message($command){
        if(mb_strlen(strip_tags($command->contact_form_name)) < 3){
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'Имя должно быть минимум 3 символа',
            ];
            return $data;
        } elseif(mb_strlen(strip_tags($command->contact_form_name)) > 100){
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'Имя должно быть максимум 100 символов',
            ];
            return $data;
        } elseif(mb_strlen(strip_tags($command->contact_form_email)) < 3) {
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'Email должно быть минимум 3 символа',
            ];
            return $data;
        } elseif (mb_strlen(strip_tags($command->contact_form_email)) > 100){
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'Email должно быть максимум 100 символов',
            ];
            return $data;
        } elseif (mb_strlen(strip_tags($command->contact_form_subject)) < 3){
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'Тема должно быть минимум 3 символа',
            ];
            return $data;
        } elseif (mb_strlen(strip_tags($command->contact_form_subject)) > 255){
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'Тема должно быть максимум 255 символов',
            ];
            return $data;
        } elseif (mb_strlen(strip_tags($command->contact_form_message)) < 3){
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'Сообщение должно быть минимум 3 символа',
            ];
            return $data;
        } else {
            DB::table('contact_form')
                ->insert([
                    'name' => strip_tags($command->contact_form_name),
                    'email' => strip_tags($command->contact_form_email),
                    'subject' => strip_tags($command->contact_form_subject),
                    'message' => strip_tags($command->contact_form_message),
                ]);
            $data = [
                'message' => 'contact_form_message',
                'error_msg' => 'success',
            ];
            return $data;
        }
    }
}
