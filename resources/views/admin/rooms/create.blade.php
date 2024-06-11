@extends('admin.includes.home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-title">
                <h1 class="m-b-10">Add New Room</h1>
            </div>
            <div class="card border-1 shadow-md rounded">
                <div class="card-body">
                    @if (session()->has('error'))
                    <div>
                        {{ Session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('admin/rooms/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="room_number">Room Number</label>
                            <input type="text" name="room_number" class="form-control" required>
                            @error('room_number')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="room_type">Type</label>
                            <select name="room_type" class="form-control" required>
                                <option value="ICU">ICU</option>
                                <option value="General">General</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="availability">Status</label>
                            <select name="availability" class="form-control" required>
                                <option value="available">Available</option>
                                <option value="occupied">Occupied</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="text" name="capacity" class="form-control" required>
                            @error('capacity')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection