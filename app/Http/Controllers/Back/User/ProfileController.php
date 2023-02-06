<?php
namespace App\Http\Controllers\Back\User;

use App\Http\Controllers\Back\BackController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends BackController
{
    public function editProfile(Request $request){
        if($request['name'] == NULL) {
            return 'Кажется вы не заполнили поле';
        } else {
            if(strlen($request['name']) > 2){
                DB::table('users')
                    ->where('id',Auth::user()->id)
                    ->update([
                        'name' => $request['name'],
                        'slogan' => $request['slogan']
                    ]);
                return 'Имя успешно изменено';
            } else {
                return 'Длинна имени минимум 3 символа';
            }
        }
    }
    public function editProfileAvatar(Request $request){
        $user_id = Auth::user()->id;
        $avatar = NULL;
        $users = DB::table('users')
            ->where('id',$user_id)
            ->get();
        foreach ($users as $user){
            $avatar = $user->avatar;
        }
        if($request['avatar'] !== NULL){
            if($avatar !== NULL){
                if(File_exists(public_path('back/img/avatar/' . $avatar))) {
                    unlink(public_path('back/img/avatar/' . $avatar));
                    $avatar = $request->file('avatar');
                    $img_name = time() . '.' . $avatar->getClientOriginalExtension();
                    $destinationPath = public_path('back/img/avatar');
                    $avatar->move($destinationPath, $img_name);
                    DB::table('users')
                        ->where('id',$user_id)
                        ->update([
                            'avatar' => $img_name
                        ]);
                    $data = [
                        'msg' => 'Успешно изменена',
                        'src' => $img_name,
                    ];
                    return $data;
                }
            } else {
                $avatar = $request->file('avatar');
                $img_name = time() . '.' . $avatar->getClientOriginalExtension();
                $destinationPath = public_path('back/img/avatar');
                $avatar->move($destinationPath, $img_name);
                DB::table('users')
                    ->where('id',$user_id)
                    ->update([
                        'avatar' => $img_name
                    ]);
                $data = [
                    'msg' => 'Успешно загружена',
                    'src' => $img_name,
                ];
                return $data;
            }
        }
    }
    public function deleteUser(){
        $user_id = Auth::user()->id;
        DB::table('users')
            ->where('id',$user_id)
            ->delete();
        return redirect()->route('front-index');
    }
}
