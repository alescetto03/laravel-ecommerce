@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">MODIFICA</div>
                    <div class="card-body">
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                        <form method="POST" action="{{ url('/order/update') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="category" class="col-form-label text-md-right">
                                    <strong>{{ __('Ordini') }}</strong>
                                </label>
                                <select id="order" class="form-control" name="order">
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->created_at->format('d/m/Y - H:i') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('Nome') }}</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surname">{{ __('Cognome') }}</label>
                                <input type="text" id="surname" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                @error('surname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" autocomplete="address" autofocus>

                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="card_number">{{ __('Credit card') }}</label>
                                <input maxlength="16" type="text" id="card_number" name="card_number" class="form-control @error('card_number') is-invalid @enderror" value="{{ old('card_number') }}" autocomplete="card_number" autofocus>

                                @error('card_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="card_intestatary">{{ __('Card Intestatary') }}</label>
                                <input type="text" id="card_intestatary" name="card_intestatary" class="form-control @error('card_intestatary') is-invalid @enderror" value="{{ old('card_intestatary') }}" autocomplete="card_intestatary" autofocus>

                                @error('card_intestatary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="expiration">{{ __('Expiration') }}</label>
                                <input maxleght="8" type="text" id="expiration" name="expiration" class="form-control @error('expiration') is-invalid @enderror" value="{{ old('expiration') }}" autocomplete="expiration" autofocus>

                                @error('expiration')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cvv">{{ __('CVV') }}</label>
                                <input maxleght="3" type="text" id="cvv" name="cvv" class="form-control @error('cvv') is-invalid @enderror" value="{{ old('cvv') }}" autocomplete="cvv" autofocus>

                                @error('cvv')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label text-md-right"> {{ __('User') }} </label>
                                <select id="user" class="form-control" name="user" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Modifica') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection