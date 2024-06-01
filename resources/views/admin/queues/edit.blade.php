<div class="container">
    <h1>Edit Queue</h1>
    <form action="{{ route('queues.update', $queue->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $queue->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $queue->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_time">Appointment Time</label>
            <input type="datetime-local" name="appointment_time" class="form-control"
                value="{{ $queue->appointment_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $queue->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $queue->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ $queue->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Queue</button>
    </form>
</div>
