 <!-- Required Js -->
 <script src="{{asset('adminn/dist/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('adminn/dist/assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('adminn/dist/assets/js/pcoded.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{asset('adminn/dist/assets/js/plugins/apexcharts.min.js')}}"></script>


<!-- custom-chart js -->
<script src="{{asset('adminn/dist/assets/js/pages/dashboard-main.js')}}"></script>
@yield('jstable')
@include ('sweetalert::alert')
<script src="{{asset('js/sweetalert2.min.js')}}" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
<script>
    swal("Message", "{{ Session::get('success')}}", 'success', {
        button:true,
        button:"OK",
    });
</script>
@endif