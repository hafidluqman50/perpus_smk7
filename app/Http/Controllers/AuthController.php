<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function FormLogin() {
        $title = 'Form Login';
        return view('login',compact('title'));
    }

    public function Authenticate(Request $request){
    	$username = $request->username;
    	$password = $request->password;
    	if (Auth::attempt(['username' => $username, 'password' => $password, 'status'=> 1 ])) {
            $this->updateLastLogin(Auth::id());
            if (Auth::user()->level==0) {
    			return redirect()->intended('/');
            }
            else if (Auth::user()->level==1) {
                return redirect()->intended('/dashboard-petugas');
            }
            else if (Auth::user()->level==2) {
                return redirect()->intended('/dashboard-admin');
            }
    	}
    	else {
    		$error = array_except($request->all(),['password']);
    		\Log::critical('Login gagal',$error);
            if (!empty($username)) {
                $check = User::where('username',$username)->firstOrFail()->status;
                if ($check==0) {
                    $data = 'Akun Di NonAktifkan';
                }
            }
            else {
                $data = 'Silahkan Isi Username Dan Password';
            }
            $data = 'User Dan Pass Salah';
            return redirect('/login-form')->with('fail',$data);
    	}
    }

    public function updateLastLogin($login_id)
    {
        $users = new User;
        $users->where('id',$login_id)->update(['last_login'=>date('Y-m-d H:i:s')]);
    }

    public function AuthLogout()
    {
	   Auth::logout();
	   return redirect('/');
    }
}
