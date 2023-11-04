<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Closure;

class AuthController extends Controller
{
    public function AuthLogin(Request $request){
        $user = $request->username;
        $request->validate([
            'username'=>['required'],
            'password'=>['required']
        ]);

        $user = User::query()->where('username',"=",$request->username)->first();
        if($user) {
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                Auth::login($user);
                $url = '';
                if($request->user()->role === 'admin'){
                    $url='admin/dashboard';
                } elseif ($request->user()->role === 'manager'){
                    $url='manager/dashboard';
                } elseif($request->user()->role === 'user'){
                    $url='/dashboard';

                }
                if(Auth::check()){
                    return redirect()->intended($url)->with('logincomplete','Log in Complete');
                }
            }else{

                return back()->with('e','ชื่อผู้ใช้หรือหรัสผ่านไม่มีในระบบ11111');
            }
        }else{

            return back()->with('e1','ชื่อผู้ใช้งานหรือหรัสผ่านไม่ถูกต้อง');
        }


    }//End Method

    public function  UserLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('logout','xxxxxxx');

    }
    //End AdminLogout Method
}
