@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <h1>Checkout</h1>
                    <h4>Totale: {{ $total }}</h4>
                    <form action="{{ url('/payment') }}" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="surname">Cognome</label>
                                    <input type="text" id="surname" name="surname" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="address">Indirizzo</label>
                                    <input type="text" id="address" name="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card_number">Numero Carta</label>
                                    <input type="text" id="card_number" name="card_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card_intestatary">Intestatario carta</label>
                                    <input type="text" id="card_intestatary" name="card_intestatary" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="expiration">Scadenza</label>
                                    <input type="text" id="expiration" name="expiration" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Conferma ordine</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection