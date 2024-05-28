<div class="container">
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" class="form-control" value="{{ $room->room_number }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" class="form-control" value="{{ $room->type }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="occupied" {{ $room->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
