<!-- resources/views/doctors/edit.blade.php -->

@extends('layouts.app')


<div class="container">
    <h1>Edit Doctor</h1>
    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" class="form-control" value="{{ $doctor->user_id }}" required>
        </div>
        <div class="form-group">
            <label for="specialization">Specialization</label>
            <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}"
                required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}" required>
        </div>
        <div class="form-group">
            <label for="available_times">Available Times</label>
            <input type="text" name="available_times" class="form-control" value="{{ $doctor->available_times }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
