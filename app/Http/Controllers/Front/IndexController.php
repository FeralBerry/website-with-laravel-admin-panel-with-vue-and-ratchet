<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IndexController extends FrontController
{
    public function index(){
        $slider = DB::table('slider')
            ->get();
        $data = array_merge($this->data(),[
            'slider' => $slider,
        ]);
        return view('front.index',['data' => $data]);
    }
    public function contact(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shop($id = null){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shopProducts(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shopProduct(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function cart(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function checkout(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function blog(){
        $blog = DB::table('blog')
            ->paginate(12);
        $data = array_merge($this->data(),[
            'blog' => $blog
        ]);
        return view('front.index',['data' => $data]);
    }
    public function blogArticle($id){
        $blog = DB::table('blog')
            ->where('id',$id);
        $data = array_merge($this->data(),[
            'blog' => $blog
        ]);
        return view('front.index',['data' => $data]);
    }
    public function blogSearch($search){
        $blog = DB::table('blog')
            ->where('title','LIKE',"%".$search."%")
            ->paginate(12);
        $data = [
            'blog_search' => $blog
        ];
        return $data;
    }
    public function shopSearch(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function delete_cart_item(Request $request,$id,$cookie_id){
        DB::table('users_cart')
            ->where('shop_id',$id)
            ->where('cookie_id',$cookie_id)
            ->delete();
        $users_cart = DB::table('users_cart')
            ->where('cookie_id',$cookie_id)
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
        ];
        return $data;
    }
}
