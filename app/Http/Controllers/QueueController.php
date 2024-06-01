<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'admin.Queues',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'queues' => Queue::all(),
            'content' => 'admin.queues.index',
        ];

        return view("admin.includes.home", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'admin.Create Queue',
            'breadcrumbs' => [
                'Queues' => route('queues.index'),
                'Create' => "#",
            ],
            'content' => 'admin.queues.create',
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
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        Queue::create($request->all());

        return redirect()->route('queues.index')->with('success', 'Queue created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Queue $queue)
    {
        $data = [
            'title' => 'admin.Queues',
            'breadcrumbs' => [
                'Queues' => route('admin.queues.index'),
                'Edit' => "#",
            ],
            'queue' => $queue,
            'content' => 'admin.queues.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Queue $queue)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $queue->update($request->all());

        return redirect()->route('queues.index')->with('success', 'Queue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Queue $queue)
    {
        $queue->delete();

        return redirect()->route('queues.index')->with('success', 'Queue deleted successfully.');
    }
}
