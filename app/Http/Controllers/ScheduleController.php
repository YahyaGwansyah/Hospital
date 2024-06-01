<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $schedules = Schedule::all();
        return view('admin.schedules.index', [
            'schedules' => $schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $doctors = \App\Models\Doctor::all();
        return view('admin.schedules.create', [
            'doctors' => $doctors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
         // validate form
         Validator::validate($request->all(), [
            'doctor_id' => 'required|integer',
            'specialization' => 'required|min:5',
            'phone' => 'required|min:5',
            'day' => 'required|min:5',
        ], [
            'doctor_id.required' => 'Kode Wajid Di isi',
            'specialization' => 'specialization Wajid Di isi',
            'phone' => 'Nomor Hp Wajid Di isi',
        ]);

        // upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/pulsas', $gambar->hashName());

        Schedule::create([
            'kode_pulsa' => $request->kode_pulsa,
            'jenis_pulsa' => $request->jenis_pulsa,
            'gambar' => $gambar->hashName(),
            'harga' => $request->harga,
            'keterangan' => $request->keterangan
        ]);

        // redirect to index
        return redirect()->route('pulsa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
