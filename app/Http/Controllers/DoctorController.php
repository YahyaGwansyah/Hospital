<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $doctors = Doctor::get(); // Load doctors with their users
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'doctor_name' => 'required|min:5', // Ensure user_id exists in users table
            'specialization' => 'required|min:5',
            'phone' => 'required|integer',
            'available_times' => 'required|min:5',
        ]);

        Doctor::create([
            'doctor_name' => $request->input('doctor_name'),
            'specialization' => $request->input('specialization'),
            'phone' => $request->input('phone'),
            'available_times' => $request->input('available_times'),
        ]);

        return redirect(route('doctors.index'))->with('success', 'Data Berhasil Di simpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor, $id): View
    {
        $doctor = Doctor::findOrFail($id);

        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        // $data = [
        //     'title' => 'admin.Doctor Edit',
        //     'breadcrumbs' => [
        //         'Doctor' => route('admin.doctors.index'),
        //         'Edit' => "#",
        //     ],
        //     'doctor' => $doctor,
        //     'content' => 'admin.doctors.edit',
        // ];

        // return view("admin.wrapper", $data);
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

