<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'admin.medical_records.index',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'medical_records' => MedicalRecord::all(),
            'content' => 'admin.medical_records.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'admin.Create MedicalRecord',
            'breadcrumbs' => [
                'MedicalRecord' => route('admin.medical_records.index'),
                'Create' => "#",
            ],
            'content' => 'admin.medical_records.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'diagnosis' => 'required',
            'treatment' => 'required'
        ]);
        MedicalRecord::create($request->all());
        return redirect()->route('medical_records.index')->with('success', 'Medical record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        return view('medical_records.show', compact('medicalRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        $data = [
            'title' => 'admin.MedicalRecord Edit',
            'breadcrumbs' => [
                'MedicalRecord' => route('admin.medical_records.index'),
                'Edit' => "#",
            ],
            'medical_record' => $medicalRecord,
            'content' => 'admin.patients.edit',
        ];

        return view("admin.wrapper", $data);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'diagnosis' => 'required',
            'treatment' => 'required'
        ]);
        $medicalRecord->update($request->all());
        return redirect()->route('medical_records.index')->with('success', 'Medical record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->route('medical_records.index')->with('success', 'Medical record deleted successfully.');
    }
}
