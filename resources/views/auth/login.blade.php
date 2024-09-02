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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="col-form-label ">Email <span
                                    class="text-danger">*</span></label>
                            <div class="position-relative ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="col-form-label ">Password <span
                                    class="text-danger">*</span></label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row mb-0 p-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-fill w-100  btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link float-end" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    {{-- <div class="text-center mt-5">
                        <p class="mb-0">Don't have an account ? <a href="auth-signup.html"
                                class="fw-semibold text-secondary text-decoration-underline">
                                SignUp</a> </p>
                    </div> --}}
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div>
    <!--end col-->
</div>
@endsection