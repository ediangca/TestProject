<?php

namespace App\Http\Controllers\Directory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DirectoryController extends Controller
{
    //
    public function index(){
        if(Auth::check())
        {
            return view('dashboard.home');
        }
        
        return redirect()->route('home')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function patient(){
        if(Auth::check())
        {
            return view('dashboard.patient');
        }


        return redirect()->route('home')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');    

        }

        public function item_services(){
            if(Auth::check())
            {
                return view('dashboard.itemandservices');
            }
    
    
            return redirect()->route('home')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');    
    
            }

    public function doctor(){
        if(Auth::check())
        {
            return view('dashboard.doctor');
        }


        return redirect()->route('home')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');    

        }

    public function guarrantor(){
        if(Auth::check())
        {
            return view('dashboard.guarrantor');
        }

        
        return redirect()->route('home')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }


}
