<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div ">

				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="{{ asset('adminn/dist/assets/images/user/karya.webp') }}" alt="User-Profile-Image">
						<div class="user-details">
							<span>{{ Auth::user()->name }}</span>
						</div>
					</div>

					<!-- <div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<form method="POST" action="{{ route('logout') }}">
								@csrf
								<li class="list-group-item"><a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="feather icon-log-out m-r-5"></i>{{ __('Log Out') }}</a></li>
						</ul>
					</div>
					</form> -->
				</div>

				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Hospital</label>
					</li>
					@if(Auth::check())
					@if(Auth::user()->usertype == 'admin')
					<li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
				<li class="nav-item">
                    <a href="{{ route('schedules.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Dokter's Schedule</span></a>
                </li> 
					@elseif(Auth::user()->usertype == 'user')
					<li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('patients.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Patient</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctors.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Doctor</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rooms.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Room</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('appointments.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Appointment</span></a>
                <li class="nav-item">
                    <a href="{{ route('queues.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Queue</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('medical_records.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Medical
                            Record</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Payment</span></a>
                </li>
                        @endif
						<!-- <li class="nav-item">
					<a href="{{url('admin/dashboard')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home" aria-hidden="true"></i></span><span class="pcoded-mtext">Logout</span></a>					
					</li> -->
					@else
					<li class="nav-item">
					<a href="{{route('users.index')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-sign-in" aria-hidden="true"></i></span><span class="pcoded-mtext">Login</span></a>					
					</li>
						@endif
					 <!-- <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('patients.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Patient</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctors.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Doctor</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rooms.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Room</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('appointments.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Appointment</span></a>
                <li class="nav-item">
                    <a href="{{ route('queues.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Queue</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('medical_records.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Medical
                            Record</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Payment</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('schedules.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Dokter's Schedule</span></a>
                </li> -->
				</ul>
			</div>
		</div>
	</nav>