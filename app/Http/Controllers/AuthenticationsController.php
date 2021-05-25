<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationsController extends Controller
{
    public function index(){
        return view('authentications.login');
    }

    public function register(){
        return view('authentications.register');
    }

    public function login(Request $request){
        // dd($request->all());
        $request->session()->flush();
        
        $data = User::where('email', $request->email)->firstOrFail();
        // dd($data->email);
        if ($data){
            if (Hash::check($request->password, $data->password)){
                if ($data->userType == 'Admin'){
                    session(['admin_login' => true]);
                    return redirect('/admin/dashboard');
                }
                else if ($data->userType == 'Volunteer'){
                    session(['volunteer_login' => true]);
                    return redirect('/volunteer/dashboard');
                }
            }
        }
        return redirect('/login')->with('message', 'Email or Password is incorrect');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
