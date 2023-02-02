<?php
namespace App\Http\Controllers\Back\User;

use App\Http\Controllers\Back\BackController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends BackController
{
    public function editProfile(Request $request){
        dd($request['avatar']);
        $data = array_merge($this->mainData(),[

        ]);
        return view('back.user.index',['data' => $data]);
    }
    public function editProfileAvatar(Request $request){
        $user_id = Auth::user()->id;
        $avatar = NULL;
        if($request['avatar'] !== NULL){
            if(File_exists(public_path('back/img/avatar/' . $request['avatar']))) {
                unlink(public_path('back/img/avatar/' . $request['avatar']));
                $avatar = $request->file('img');
                $img_name = time() . '.' . $avatar->getClientOriginalExtension();
                $destinationPath = public_path('back/img/avatar');
                $avatar->move($destinationPath, $img_name);
                DB::table('users')
                    ->where('id',$user_id)
                    ->update([
                        'avatar' => $avatar
                    ]);
            } else {
                $avatar = $request->file('img');
                $img_name = time() . '.' . $avatar->getClientOriginalExtension();
                $destinationPath = public_path('back/img/avatar');
                $avatar->move($destinationPath, $img_name);
                DB::table('users')
                    ->where('id',$user_id)
                    ->update([
                        'avatar' => $avatar
                    ]);
            }
        }
        return $avatar;
    }
}
