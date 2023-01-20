<?php

namespace App\Http\Middleware;

use App\Models\Friends;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoomsFriends
{
    public function handle($request, Closure $next)
    {
        $friends = Friends::all()
            ->where('user_id',Auth::user()->id);
        $room_id = basename($request->url());
        $access = false;
        foreach ($friends as $friend){
            if($room_id == $friend->room_id){
                $access = true;
            }
        }
        if(Auth::user() && $access == true){
            return $next($request);
        }
        return redirect()->back();
    }
}
