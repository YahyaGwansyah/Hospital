<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'admin.doctors',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'doctors' => Doctor::all(),
            'content' => 'admin.Doctors.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'admin.Create Doctor',
            'breadcrumbs' => [
                'Doctors' => route('doctors.index'),
                'Create' => "#",
            ],
            'content' => 'admin.doctors.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization' => 'required',
            'phone' => 'required',
            'available_times' => 'required'
        ]);
        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $data = [
            'title' => 'admin.Doctor Edit',
            'breadcrumbs' => [
                'Doctor' => route('admin.doctors.index'),
                'Edit' => "#",
            ],
            'doctor' => $doctor,
            'content' => 'admin.doctors.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'specialization' => 'required',
            'phone' => 'required',
            'available_times' => 'required'
        ]);
        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}

