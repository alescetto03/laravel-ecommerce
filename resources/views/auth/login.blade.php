@extends('layouts.header')

@section('content')
    <div class="row justify-content-end">
        <div class="col-md-6 brand-halfpage">
            <div class="box">
                <img src="{{asset('img/logo.png')}}" alt="logo" style="width:40%; height: 40%">
                <h2 class="text-white"><strong>MeMi</strong>commerce</h2>
            </div>
        </div>
        <div class="col-md-6 py-3 form-box">
            <div class="form-header">
                <h3>{{ __('Login') }}</h3>
            </div>
            <div class="separator-form py-1"></div>
            <div class="form-body m-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row login-form-box">
                        <label for="email" class="col-md-4 col-form-label text-md-right login-form-txt">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="login-form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row login-form-box">
                        <label for="password" class="col-md-4 col-form-label text-md-right login-form-txt">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="login-form-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row login-form-box">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link clr text-dark" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="separator-form py-2"></div>
            <div class="login-registretionRemind m-2">
                <div class="text">
                    <p>Non hai ancora un account?</p>
                </div>
                <div class="btn">
                    <a href="{{ url('/register') }}">
                        <button class="btn btn-dark">Registrati</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
