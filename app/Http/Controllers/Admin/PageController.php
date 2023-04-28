<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //show dashboard

    public function showDashboard(){
        return view('admin.dashboard');
    }

    public function showLogin(){
        return view('admin.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $cre = $request->only('email','password');

        if(Auth::guard('admin')->attempt($cre)){
            return redirect('/admin')->with(['success' => 'Welcome Admin Dashboard']);
        }

        return redirect()->back()->with(['error' => 'Email and password Match']);
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
