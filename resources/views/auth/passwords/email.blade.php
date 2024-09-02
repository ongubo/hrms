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
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email" class="col-form-label ">{{ __('Email Address')
                                    }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12  ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection