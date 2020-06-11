@extends('layouts.header')

@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="nav linkCrud">
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-orangeBrand" href="{{ url('order/add') }}">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('order/read') }}">READ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('order/update') }}">UPDATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('order/delete') }}">DELETE</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 separetorCrud"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 m-4">
                <div class="imgBox p-3 text-center">
                    <svg class="bi bi-pencil-square iconAdd" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="p-2 text-center">
                    <h2 class="text-orangeBrand">CREATE</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->
                <form method="POST" action="{{ url('/order/add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Nome') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="surname" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Cognome') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="surname" name="surname" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('surname')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Email') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="email" name="email" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Address') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="address" name="address" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="card_number" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Credit card') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input maxlength="16" type="text" id="card_number" name="card_number" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required >

                            @error('card_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Address') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="address" name="address" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="card_number" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Credit card') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input maxlength="16" type="text" id="card_number" name="card_number" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required >

                            @error('card_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="card_intestatary" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Card Intestatary') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="card_intestatary" name="card_intestatary" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('card_intestatary')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expiration" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Expiration') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input maxlength="8" type="text" id="expiration" name="expiration" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('expiration')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cvv" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('CVV') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input maxlength="3" type="text" id="cvv" name="cvv" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" required>

                            @error('cvv')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('User') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <select id="user" class="border-0 form-control @error('name') is-invalid @enderror" name="user" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Conferma') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection