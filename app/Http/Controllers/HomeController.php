<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Back\BackController;

class HomeController extends BackController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array_merge($this->mainData(),[

        ]);
        return view('back.user.index',['data' => $data]);
    }
}
