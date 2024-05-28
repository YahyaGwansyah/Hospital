<div class="container">
    <h1>Edit Appointment</h1>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $appointment->date }}" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" name="time" class="form-control" value="{{ $appointment->time }}" required>
        </div>
        <div class="form-group">
            <label for="reason">Reason</label>
            <textarea name="reason" class="form-control" required>{{ $appointment->reason }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
