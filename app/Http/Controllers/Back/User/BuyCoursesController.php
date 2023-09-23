<?php
namespace App\Http\Controllers\Back\User;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyCoursesController extends BackController
{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data = array_merge($this->userData(),[

        ]);
        return view('back.user.index',['data' => $data]);
    }

}
