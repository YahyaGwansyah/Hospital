<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = [
        //     'title' => 'admin.Patients',
        //     'breadcrumbs' => [
        //         // 'Category' => "#",
        //     ],
        //     'patients' => Patient::all(),
        //     'content' => 'admin.patients.index',
        // ];

        // return view("admin.includes.home", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'admin.Create Patient',
            'breadcrumbs' => [
                'Patients' => route('patients.index'),
                'Create' => "#",
            ],
            'content' => 'admin.patients.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required',
            'phone' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required'
        ]);
        Patient::create($data);
        return redirect()->route('admin.patients.index')->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        $data = [
            'title' => 'admin.Patients',
            'breadcrumbs' => [
                'Patients' => route('admin.patients.index'),
                'Edit' => "#",
            ],
            'patient' => $patient,
            'content' => 'admin.patients.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required'
        ]);
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
