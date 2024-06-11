<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;
class ScheduleController extends Controller
{
    public function index()
    {
    
        $schedules = Schedule::latest()->paginate(5);

        $schedules = Schedule::orderBy('id', 'desc')->get();
        $schedules = Schedule::count();
        $schedules = Schedule::all();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $doctors = \App\Models\Doctor::all();
        return view('admin.schedules.create', [
            'doctors' => $doctors
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        $data = Schedule::create($validation);
        if($data) {
            return redirect()->route('admin/schedules')->with('success', 'Schedule Data Was Added');
        } else {
            return redirect()->route('admin/schedules/create')->with('error', 'Some Problem Secure');
        }
    }

    public function edit(string $id)
    {
        $doctors = \App\Models\Doctor::all();
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedules.update', [
                'schedule' => $schedule,
                'doctors' => $doctors
        ]);
    }

    public function update(Request $request, $id)
    {
        $schedules = Schedule::findOrFail($id);
        $doctor_id = $request->doctor_id;
       $day_of_week = $request->day_of_week;
       $start_time = $request->start_time;
       $end_time = $request->end_time;

        $schedules -> doctor_id = $doctor_id;
        $schedules -> day_of_week = $day_of_week;
        $schedules -> start_time = $start_time;
        $schedules -> end_time = $end_time;
        $data = $schedules->save();
        if($data) {
            return redirect()->route('admin/schedules')->with('success', 'Schedule Data Was Changed');
        } else {
            return redirect()->route('admin/schedules/update')->with('error', 'Some Problem Secure');
        }
    }

    public function delete($id)
    {
        $schedules = Schedule::findOrFail($id)->delete();
        if($schedules) {
            return redirect()->route('admin/schedules')->with('success', 'Schedule Data Was Deleted');
        } else {
            return redirect()->route('admin/schedules')->with('error', 'Schedule Delete Fail');
        }
    }
}
