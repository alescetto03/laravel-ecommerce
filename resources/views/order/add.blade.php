@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">AGGIUNGI</div>
                    <div class="card-body">
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                        <form method="POST" action="{{ url('/order/add') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Nome') }}</label>
                                <input type="text" id="name" name="name" class="form-control" required>

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surname">{{ __('Cognome') }}</label>
                                <input type="text" id="surname" name="surname" class="form-control" required>

                                @error('surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="text" id="email" name="email" class="form-control" required>

                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="text" id="address" name="address" class="form-control" required>

                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="card_number">{{ __('Credit card') }}</label>
                                <input maxlength="16" type="text" id="card_number" name="card_number" class="form-control" required >

                                @error('card_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="card_intestatary">{{ __('Card Intestatary') }}</label>
                                <input type="text" id="card_intestatary" name="card_intestatary" class="form-control" required>

                                @error('card_intestatary')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="expiration">{{ __('Expiration') }}</label>
                                <input maxlength="8" type="text" id="expiration" name="expiration" class="form-control" required>

                                @error('expiration')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cvv">{{ __('CVV') }}</label>
                                <input maxlength="3" type="text" id="cvv" name="cvv" class="form-control" required>

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
                            <button type="submit" class="btn btn-primary">{{ __('Conferma') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection