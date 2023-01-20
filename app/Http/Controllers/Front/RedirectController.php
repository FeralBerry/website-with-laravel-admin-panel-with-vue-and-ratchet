<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function index($route_name = NULL){
        return Redirect::to($route_name);
    }
}
