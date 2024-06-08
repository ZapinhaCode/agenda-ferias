@extends('login.form_login')

@section('content')
<div class="container-fluid flex justify-content-center align-items-center">
    <div class="row align-items-center container-md py-5 position-fixed top-50 start-50 bg-dark  rounded-5 translate-middle">
        
        <div class=" col-7 ">
        <h2>Faça login para acessar sua conta FredomFrames</h1>
            <form method="POST" action="{{ route('login') }}" class="py-5">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0 align-items-center">
                    <div class="col-3 offset-md-4 ">
                        <div class="form-check d-flex ">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label ms-2" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                         {{-- if (Route::has('password.request')) --}}
                    <a class="btn btn-link col-3 " href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 d-grid gap-2 offset-md-4 ">
                        <button type="submit" class="btn btn-success px-5 object-fit-cover fs-4">
                            {{ __('Login') }}
                        </button>


                    </div>
                </div>
            </form>

        </div>
        <div class="col">

            <img class="vh-30" src="{{ asset('images/loginimg.svg') }}" />


        </div>
    </div>

</div>
@endsection