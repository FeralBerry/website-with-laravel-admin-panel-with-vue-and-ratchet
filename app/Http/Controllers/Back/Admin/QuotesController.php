<?php
namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Back\BackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotesController extends BackController
{
    public function index(){
        $data = array_merge($this->adminData(),[

        ]);
        return view('back.admin.index',['data' => $data]);
    }
    public function add(Request $request){
        DB::table('quotes_footer')
            ->insert([
                'author' => $request['author'],
                'quotes' => $request['quotes'],
            ]);
        $quotes_footer = DB::table('quotes_footer')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();
        return $quotes_footer;
    }
    public function edit(Request $request,$id){
        DB::table('quotes_footer')
            ->where('id',$id)
            ->update([
                'author' => $request['author'],
                'quotes' => $request['quotes'],
            ]);
    }
    public function delete($id){
        DB::table('quotes_footer')
            ->where('id',$id)
            ->delete();
    }
}
