<div class="container">
    <h1>Edit Medical Record</h1>
    <form action="{{ route('medical_records.update', $record->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $record->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $record->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" required>{{ $record->diagnosis }}</textarea>
        </div>
        <div class="form-group">
            <label for="treatment">Treatment</label>
            <textarea name="treatment" class="form-control" required>{{ $record->treatment }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
