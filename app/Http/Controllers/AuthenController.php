<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function post(Request $request)
    {   
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $data = User::where('email','=',$request->email)->first();
        if ($data!=null) {
            if ($data->role=='SuperAdmin') {
                if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'SuperAdmin'])) {
                    // dd('masuk id');
                    $request->session()->regenerate();
                    return redirect()->intended('superadmin');
                }
                dd($request,$data);
                $this->logout();
            }
            else if ($data->role=='Owner') {
                if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'Owner'])) {
                    $request->session()->regenerate();
                    return redirect()->intended('owner');
                }
                $this->logout();
            }
            else if ($data->role=='Kasir') {
                if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'Kasir'])) {
                    $request->session()->regenerate();
                    return redirect()->intended('kasir');
                }
                $this->logout();
            }
            $this->logout();
        }
        return redirect('login')->with('gagal','email belum terdaftar');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('login')->with('log','silahkan login untuk masuk');
    }
}
