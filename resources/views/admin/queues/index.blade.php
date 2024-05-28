<div class="container">
    <h1>Queues</h1>
    <a href="{{ route('queues.create') }}" class="btn btn-primary">Add New Queue</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($queues as $queue)
                <tr>
                    <td>{{ $queue->id }}</td>
                    <td>{{ $queue->patient->user->name }}</td>
                    <td>{{ $queue->doctor->user->name }}</td>
                    <td>{{ $queue->appointment_time }}</td>
                    <td>{{ $queue->status }}</td>
                    <td>
                        <a href="{{ route('queues.edit', $queue->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('queues.destroy', $queue->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
