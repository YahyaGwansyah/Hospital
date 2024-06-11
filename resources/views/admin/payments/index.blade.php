@extends('admin.includes.home')

@section('csstable')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('jstable')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $('#data-table').DataTable();
    });
</script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    confirmDelete = function(button) {
        var url = $(button).data('url');
        swal({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
            dangerMode: true,
            buttons: true
        }).then(function(value) {
            if (value) {
                window.location = url;
            }
        });
    }
</script>
@endsection

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard Payment</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard Payment</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <a href="{{ route('admin/payments/create') }}" class="btn btn-primary rounded-pill">Add New Payment</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
        {{ $message }}
    </div>
    @endif
</div>
<div class="container mt-4">
    <div class="card">
        <div class="col-md-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Appointment</th>
                                <th class="text-center">Patient</th>
                                <th class="text-center">Payment Day</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ optional($payment->appointment)->id ?? 'No Appointment' }}</td>
                                <td class="text-center">{{ optional($payment->patient)->name ?? 'No Patient' }}</td>
                                <td class="text-center">{{ $payment->payment_date }}</td>
                                <td class="text-center">{{ $payment->amount }}</td>
                                <td class="text-center">{{ $payment->status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin/payments/edit', ['id' => $payment->id]) }}" class="btn btn-warning rounded-pill">Edit</a>
                                    <a onclick="confirmDelete(this)" data-url="{{ route('admin/payments/delete', ['id' => $payment->id]) }}" class="btn btn-danger rounded-pill" role="button">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Payment belum tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
