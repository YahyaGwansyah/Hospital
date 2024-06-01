@extends('admin.includes.home')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Dokter</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard Dokter</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Doctors</h1>
            <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New Doctor</a>
            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
            @endif
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Phone</th>
                        <th>Available Times</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $doctor)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $doctor->doctor_name }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->available_times }}</td>
                        <td>
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
              <div class="alert alert-danger">Data Pulsa belum tersedia</div>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection