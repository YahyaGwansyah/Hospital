<div class="container">
    <h1>Add New Doctor</h1>
    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="specialization">Specialization</label>
            <input type="text" name="specialization" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="available_times">Available Times</label>
            <input type="text" name="available_times" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
