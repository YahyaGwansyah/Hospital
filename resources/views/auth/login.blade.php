<!DOCTYPE html>
<html lang="en">

<head>

    <title>Log In</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('style/assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('adminn/dist/assets/css/style.css')}}">




</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="mb-3 f-w-400">Signin</h4>
                        <hr>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group mb-3" for="email" value="{{ __('Email') }}">
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4" for="password" value="{{ __('Password') }}">
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="text-left mb-4 mt-2">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>


                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif

                                <x-primary-button class="btn btn-primary mb-2">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                            <hr>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}" class="f-w-400">Signup</a></p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{asset('adminn/dist/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('adminn/dist/assets/js/plugins/bootstrap.min.js')}}"></script>

<!-- <script src="{{asset('adminn/dist/assets/js/pcoded.min.js')}}"></script> -->



</body>

</html>