<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index(){
        if(Auth::check())
        {   
            if(Auth::User()->user_type == 'admin'){
                return view('dashboard.home');
            }else{
                return view('userdashboard.home');
            }

        }
        
        return redirect()->route('home')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
}
