<?php

namespace App\Http\Controllers\Directory;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check())
        {
            return view('dashboard.patient');
        }
        
        return redirect()->route('home')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
