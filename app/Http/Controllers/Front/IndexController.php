<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class IndexController extends FrontController
{
    public function index(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function contact(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shop(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function shopProduct(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }
    public function blog(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.index',['data' => $data]);
    }

}
