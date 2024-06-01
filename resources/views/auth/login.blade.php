<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <link rel="icon" href="{{asset('style/assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- Tailwind CSS -->
    <link href="{{asset('sign/assets/css/tailwind.min.css')}}" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('sign/assets/css/animate.min.css')}}">

    <!-- Custom CSS for particles.js -->
    <style>
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #0e7d75;
            z-index: -1;
        }
        .auth-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen relative">
    <!-- Particles.js container -->
    <div id="particles-js"></div>

    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper animate__animated animate__fadeIn">
        <div class="auth-content text-center">
            <img src="{{asset('adminn/dist/assets/images/logo.png')}}" alt="logo" class="img-fluid mb-4 mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96">
                <h4 class="text-2xl font-bold mb-5">Sign In</h4>
                <hr class="mb-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4" for="email">
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('email') }}" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4" for="password">
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center mb-4">
                        <input id="remember_me" type="checkbox" class="mr-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <label for="remember_me" class="text-sm text-gray-600">{{ __('Remember me') }}</label>
                    </div>

                    <!-- Forgot Password -->
                    <div class="mt-4 items-center justify-content-center mb-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        {{ __('Log in') }}
                    </button>

                    <!-- Signup Link -->
                    <p class="mt-4 text-center text-gray-600">Don’t have an account? <a href="{{ route('register') }}" class="text-green-600 hover:underline">Signup</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-- [ auth-signin ] end -->

    <!-- Required Js -->
    <script src="{{asset('sign/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('sign/assets/js/bootstrap.min.js')}}"></script>

    <!-- Toastr JS -->
    <script src="{{asset('sign/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('sign/assets/js/toastr.min.js')}}"></script>

    <!-- particles.js -->
    <script src="{{asset('sign/assets/js/particles.min.js')}}"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "star",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
@if(Session::has('success'))
<script>
    toastr.options = {
        "progressBar" : true,
        "closeButton" : true,

    }
    // toastr.success("{{ Session::get('success')}}",'Selamat Datang Admin!',{timeOut:12000});
    // toastr.info("{{ Session::get('message')}}");
    // toastr.warning("{{ Session::get('message')}}");
    // toastr.warning("{{ Session::get('message')}}",'error!',{timeOut:12000});
            toastr.success("{{ Session::get('success') }}");
</script>
@endif
@if(Session::has('error'))
<script>
    toastr.error("{{ Session::get('error') }}");
</script>
@endif
</body>

=======

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

>>>>>>> a2cebf7a2b17ac670c87251e90e62dd471dffdd0
</html>