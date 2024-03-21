<?php

namespace App\Http\Controllers\Directory;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    //
    public function index(){
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
        
        return redirect()->route('home')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
    public function store(Request $request){ //POST
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
    }
    public function create(){ //GET
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
    }
    public function show($id){ //GET
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
    }
    public function update(Request $request, Patient $patient){ //PUT|PATCH
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
    }
    public function destroy($id){ //DELETE
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
    }
    public function edit($id){ //GET
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
    }

}
