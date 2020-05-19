@extends('layouts.header')

@section('content')

    <div class="row justify-content-end">
        <div class="col-md-6 brand-halfpage">
            <div class="box">
                <img src="{{asset('img/logo.png')}}" alt="logo" style="width:40%; height: 40%">
                <h2 class="text-white"><strong>DNA</strong>commerce</h2>
            </div>
        </div>
        <div class="col-md-6 py-3 form-box">
            <div class="form-header">
                <h3>{{ __('Register') }}</h3>
            </div>
            <div class="separator-form py-1"></div>
            <div class="form-body m-3">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row register-form-box">
                        <label for="name" class="col-md-4 col-form-label text-md-right login-form-txt">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="login-form-input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row register-form-box">
                        <label for="surname" class="col-md-4 col-form-label text-md-right login-form-txt">{{ __('Surname') }}</label>
                        <div class="col-md-6">
                            <input id="surname" type="text" class="login-form-input form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row register-form-box">
                        <label for="email" class="col-md-4 col-form-label text-md-right login-form-txt">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="login-form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row register-form-box">
                        <label for="password" class="col-md-4 col-form-label text-md-right login-form-txt">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="login-form-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row register-form-box">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right login-form-txt">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="login-form-input form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
