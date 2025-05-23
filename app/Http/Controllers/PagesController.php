<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PagesController extends Controller
{

    public function index(){
        return view('index');
    }
    public function dashboard(){
        return view('dashboard.dashboard_layout');
    }
}
