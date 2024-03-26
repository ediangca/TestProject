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
    public function index(Request $request)
    {
        // $patients = Patient::all();
        if (Auth::check()) {
            // dd($request);
            if (empty ($request->startDate) && empty ($request->endDate)) {
                $currentDate = now()->format('Y-m-d');
                $patients = Patient::whereDate('created_at', '>=', $currentDate)
                    ->whereDate('created_at', '<=', $currentDate)->get();

                return view('dashboard.patients', ['patients' => $patients]);
            } else {
                $startDate = $request->startDate;
                $endDate = $request->endDate;
                // dd($request->search, $startDate, $endDate);
                if (!empty ($request->search)) {
                    
                    $search = $request->search;

                    $patients = Patient::where(function ($query) use ($request) {
                        $query->where('lastname', 'like', '%' . $request->search . '%')
                            ->orWhere('firstname', 'like', '%' . $request->search . '%')
                            ->orWhere('middlename', 'like', '%' . $request->search . '%');
                    })
                        ->whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate)
                        ->get();
                    return view('dashboard.patients', ['patients' => $patients])
                        ->with('search', $search)
                        ->with('startDate', $startDate)
                        ->with('endDate', $endDate);
                }else{
                    $patients = Patient::whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate)
                    ->get();
                    return view('dashboard.patients', ['patients' => $patients])
                        ->with('startDate', $startDate)
                        ->with('endDate', $endDate);
                }
            }

            // dd($patients);
        }

        return redirect()->route('home')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
    public function create()
    { //GET
        if (Auth::check()) {
            return view('dashboard.patient.form');
        }
    }

    public function store(Request $request)
    { //POST

        if (!Auth::check()) {
            return redirect()->route('home')
                ->withErrors([
                    'email' => 'Please login to access the dashboard.',
                ])->onlyInput('email');
        }

        $data = $request->validate([
            'lastname' => 'required|string|max:250',
            'firstname' => 'required|string|max:250',
            'middlename' => 'required|string|max:250',
            'birthdate' => 'required',
            'contactNo' => 'required|min:10',
        ]);


        // dd($request);
        $patient = Patient::create($data);
        return redirect()->back()
            ->with('alert', 'Patient Registered successfully!');

    }
    public function show($id)
    { //GET
        if (Auth::check()) {
            return view('dashboard.patients');
        }
    }
    public function editById($id)
    { //GET
        if (Auth::check()) {
            $patient = Patient::find($id);
            return response()->json([
                'status' => 200,
                'patient' => $patient,

            ]);
        }
        return redirect()->route('home')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
    public function updateById(Request $request)
    { //PUT|PATCH
        if (Auth::check()) {

            $data = $request->validate([
                'ulastname' => 'required|string|max:250',
                'ufirstname' => 'required|string|max:250',
                'umiddlename' => 'required|string|max:250',
                'ubirthdate' => 'required',
                'ucontactNo' => 'required|min:10',
            ]);


            // dd($request);
            $pid = $request->id;
            // dd($pid);
            $patient = Patient::find($pid);
            // Check if patient exists
            if ($patient) {
                // Update patient properties
                $patient->lastname = $request->ulastname;
                $patient->firstname = $request->ufirstname;
                $patient->middlename = $request->umiddlename;
                $patient->birthdate = $request->ubirthdate;
                $patient->contactNo = $request->ucontactNo;
                $patient->save();

                return redirect()->back()
                    ->with('alert', 'Patient Updated successfully!');
            } else {
                // Handle case where patient is not found
                return redirect()->back()->withErrors(['error' => 'Patient not found']);
            }

        }
        return redirect()->route('home')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
    public function deleteById(Request $request)
    {
        if (Auth::check()) {
            // dd($request);
            $pid = $request->id;
            // dd($pid);
            $patient = Patient::find($pid);
            // Check if patient exists
            if ($patient) {

                //Implement a checking if account has trasnsaction
                //If(has transaction)
                //prompt to inform that the patient is cannot ne delete due to already transactions.
                //otherwise delete

                // Delete patient properties
                $patient->delete();

                return redirect()->back()
                    ->with('alert', 'Patient Deleted successfully!');
            } else {
                // Handle case where patient is not found
                return redirect()->back()->withErrors(['error' => 'Patient not found']);
            }
        }
        return redirect()->route('home')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function edit($id)
    { //GET
        if (Auth::check()) {
            $patient = Patient::find($id);
            return response()->json($patient);
        }
        return redirect()->route('home')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
    public function update(Request $request, Patient $patient)
    { //PUT|PATCH
        if (Auth::check()) {
            $data = $request->validate([
                'lastname' => 'required|string|max:250',
                'firstname' => 'required|string|max:250',
                'middlename' => 'required|string|max:250',
                'birthdate' => 'required',
                'contactNo' => 'required|min:10',
            ]);

            $id = $request->input('pid');
            $patient = Patient::find($id);
            $patient->lastname = $request->input('lastname');
            $patient->firstname = $request->input('firstname');
            $patient->middlename = $request->input('middlename');
            $patient->birthdate = $request->input('birthdate');
            $patient->contactNo = $request->input('contactNo');
            $patient->save();

            return redirect()->back()->with('alert', 'Patient Updated successfully!');

        }
        return redirect()->route('home')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
    public function destroy(Request $request, $id)
    {
        if (Auth::check()) {
            dd($request->all());
            if ($request->ajax()) {
                // Perform the deletion

                $patient = Patient::find($patient->id);
                $patient->delete();

                return response()->json(['message' => 'Patient deleted successfully.'], 200);
            }
        }

        // If the request is not AJAX, you can handle it differently,
        // for example, by redirecting back to the previous page.
        return back()->with('error', 'Invalid request.');
    }

    public function filter(Request $request)
    {
        if (Auth::check()) {
            // $patients = Patient::all();

            $search = $request->search;
            $currentDate = now()->format('Y-m-d');
            $startDate = $request->input('startDate', $currentDate);
            $endDate = $request->input('endDate', $currentDate);

            $patients = Patient::where(function ($query) use ($search, $startDate, $endDate) {
                $query->where('lastname', 'like', "%$search%")
                    ->orWhere('firstname', 'like', "%$search%")
                    ->orWhere('middlename', 'like', "%$search%");
            })
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate);
                })
                ->get();


            return redirect()->route('directory_patient', ['patients' => $patients, 'currentDate' => $currentDate])
                ->with('startDate', $startDate)->with('endDate', $endDate);
        }

        return redirect()->route('home')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
}
