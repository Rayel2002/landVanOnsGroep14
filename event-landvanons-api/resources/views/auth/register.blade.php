@extends('layouts.app')

@section('content')
    <style>
        .body-bg {
            background-color: rgb(219, 51, 151);
            background-image: linear-gradient(315deg, rgb(81, 146, 56), rgb(148, 208, 45));
        }
        .offset {
            margin-top: -8rem;
        }
        .grey-border{
            border: 1px solid grey;
        }
    </style>
    <body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0"
          style="font-family:'Source Sans Pro',sans-serif;">

    <div class="offset container flex justify-center items-center h-screen ">
        <div class="row justify-content-center ">
            <div class="col-md-8 ">
                <div class="border border-gray-300 rounded-lg drop-shadow-2xl bg-white">
                    <h1 class="font-bold p-2">Registreer je account</h1>
                    <div class="card-body p-1">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Naam') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="grey-border form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('E-mail adres') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="grey-border form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Wachtwoord') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="grey-border form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Wachtwoord bevestigen') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control grey-border "
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn rounded-lg p-2 text-white hover:shadow-xl font-bold" style="background-color: rgb(219, 51, 151) ;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
