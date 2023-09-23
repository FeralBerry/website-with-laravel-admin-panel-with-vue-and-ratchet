<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function add(Request $request){
        DB::table('shop_category')
            ->insert([
                'name' => $request['name'],
            ]);
        $shop_category = DB::table('shop_category')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();
        return $shop_category;
    }
    public function edit(Request $request,$id){
        DB::table('shop_category')
            ->where('id',$id)
            ->update([
                'name' => $request['name'],
            ]);
    }
    public function delete($id){
        DB::table('shop_category')
            ->where('id',$id)
            ->delete();
        DB::table('shop')
            ->where('category',$id)
            ->update([
                'category' => null
            ]);
    }
}
