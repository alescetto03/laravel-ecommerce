@extends('layouts.header')

@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="nav linkCrud">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('order/add') }}">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('order/read') }}">READ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-orangeBrand" href="{{ url('order/update') }}">UPDATE</a>
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
                    <svg class="bi bi-arrow-counterclockwise iconAdd" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.83 6.706a5 5 0 00-7.103-3.16.5.5 0 11-.454-.892A6 6 0 112.545 5.5a.5.5 0 11.91.417 5 5 0 109.375.789z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M7.854.146a.5.5 0 00-.708 0l-2.5 2.5a.5.5 0 000 .708l2.5 2.5a.5.5 0 10.708-.708L5.707 3 7.854.854a.5.5 0 000-.708z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="p-2 text-center">
                    <h2 class="text-orangeBrand">UPDATE</h2>
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
                <form method="POST" action="{{ url('/order/update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="category" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Ordini') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <select id="order" class="border-0 form-control" name="order">
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->created_at->format('d/m/Y - H:i') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Nome') }}</strong>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                            <input type="text" id="surname" name="surname" class="login-form-input border-dark form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}" autocomplete="surname" autofocus>

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
                            <input type="text" id="email" name="email" class="login-form-input border-dark form-control form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>

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
                            <input type="text" id="address" name="address" class="login-form-input border-dark form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" autocomplete="address" autofocus>

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
                            <input maxlength="16" type="text" id="card_number" name="card_number" class="login-form-input border-dark form-control @error('card_number') is-invalid @enderror" value="{{ old('card_number') }}" autocomplete="card_number" autofocus>

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
                            <input type="text" id="card_intestatary" name="card_intestatary" class="login-form-input border-dark form-control @error('card_intestatary') is-invalid @enderror" value="{{ old('card_intestatary') }}" autocomplete="card_intestatary" autofocus>

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
                            <input maxleght="8" type="text" id="expiration" name="expiration" class="login-form-input border-dark form-control @error('expiration') is-invalid @enderror" value="{{ old('expiration') }}" autocomplete="expiration" autofocus>

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
                        <input maxleght="3" type="text" id="cvv" name="cvv" class="login-form-input border-dark form-control @error('cvv') is-invalid @enderror" value="{{ old('cvv') }}" autocomplete="cvv" autofocus>

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
                            <select id="user" class="login-form-input border-0 form-control" name="user" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Modifica') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection