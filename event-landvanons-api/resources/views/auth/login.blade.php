@extends('layouts.app')

@section('content')
    <style>
        .body-bg {
            background-color: rgb(219, 51, 151);
            background-image: linear-gradient(315deg, rgb(81, 146, 56), rgb(148 ,208, 45));
        }
    </style>
    <body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Source Sans Pro',sans-serif;">

    <div class="container flex justify-center items-center h-screen ">
        <div class="row justify-content-center ">
            <div class="col-md-8 ">
                <div class="border border-gray-300 rounded-lg drop-shadow-2xl bg-white">
                    <h1 class="font-bold p-2">sign in to your account</h1>
                    <div class="card-body p-1">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6 p-1">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row p-1">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn rounded-lg p-2 text-white hover:shadow-xl font-bold" style="background-color: rgb(219, 51, 151) ;">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
