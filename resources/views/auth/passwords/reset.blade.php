@extends('layouts.auth')

@section('content')
<div class="row g-0 align-items-center">
    <div class="col-md-5 col-sm-10  mx-auto">
        <div class="card mb-0 border-0 shadow-none mb-0">

            <div class="card-body p-sm-5 m-lg-4">
                <div class="user-thumb text-center">
                    <img src={{ asset("assets/images/logo.jpg") }} class="rounded-circle img-thumbnail avatar-lg"
                        alt="thumbnail">
                </div>
                <div class="text-center mt-5">
                    <h5 class="fs-3xl">Welcome</h5>
                    <p class="text-muted">Sign in to continue to {{ config('app.name') }}.</p>
                </div>
                <div class="p-2 mt-5">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email" class="col-form-label ">{{ __('Email Address')
                                    }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="password" class="col-form-label ">{{ __('Password')
                                    }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="password-confirm" class="col-form-label ">{{ __('Confirm
                                    Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
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