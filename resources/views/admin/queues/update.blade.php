@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    <form action="{{ route('admin/queues/update', ['id' => $queue->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="appointment_id">ID Appointment</label>
                            <select class="form-control" id="appointment_id" name="appointment_id" required>
                                @foreach ($appointments as $appointment)
                                <option value="{{ $appointment->id }}" {{ $appointment->id == $queue->appointment_id ? 'selected' : '' }}>
                                    {{ $appointment->id }} - {{ $appointment->patient->name }} dengan
                                    {{ $appointment->doctor->doctor_name }} pada {{ $appointment->date }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="queue_number">Nomor Antrian</label>
                            <input type="number" class="form-control" id="queue_number" name="queue_number" value="{{ $queue->queue_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending" {{ $queue->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $queue->status == 'confirmed' ? 'selected' : '' }}>Confirmed
                                </option>
                                <option value="completed" {{ $queue->status == 'completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="cancelled" {{ $queue->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Queue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection