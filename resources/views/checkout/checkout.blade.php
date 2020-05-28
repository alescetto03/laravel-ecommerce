@extends('layouts.header')

@section('content')
    <div class="container-md p-3">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="container-checkout m-3">
                    <div class="card bg-brandLight">
                        <div class="card-header bg-dark">
                            <h3 class="text-orangeBrand">CHECKOUT</h3>
                        </div>
                        <div class="card-body container-checkout">
                            <form method="post" action="{{ url('/payment') }}">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-6 col-checkout">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 container-title">
                                                <h4 class="text-dark">Indirizzo di Fatturazione</h4>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nome</label>
                                                    <input type="text" id="name" name="name" class="form-control" required placeholder="Mario">

                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="surname">Cognome</label>
                                                    <input type="text" id="surname" name="surname" class="form-control" required placeholder="Rossi">

                                                    @error('surname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" id="email" name="email" class="form-control" required placeholder="mariorossi@test.com">

                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="address">Indirizzo</label>
                                                    <input type="text" id="address" name="address" class="form-control" required placeholder="Rome, IT">

                                                    @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-checkout">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6 container-title">
                                                <h4 class="text-success">Pagamento</h4>
                                            </div>
                                            <div class="col-md-6 img-metodPayment">
                                                <img src="{{asset('img/MetodiPagamento.png')}}" width="140px">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="card_number">Numero Carta</label>
                                                    <input maxlength="16" type="text" id="card_number" name="card_number" class="form-control" required placeholder="1111 - 2222 - 3333 - 4444">

                                                    @error('card_number')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="card_intestatary">Intestatario carta</label>
                                                    <input type="text" id="card_intestatary" name="card_intestatary" class="form-control" required placeholder="Mario Rossi">

                                                    @error('card_intestatary')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="expiration">Scadenza</label>
                                                    <input maxlength="8" type="text" id="expiration" name="expiration" class="form-control" required placeholder="MM / YY">

                                                    @error('expiration')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="cvv">CVV</label>
                                                    <input maxlength="3" type="text" id="cvv" name="cvv" class="form-control" required placeholder="XXX">

                                                    @error('cvv')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 custom-control custom-checkbox">
                                                <input type="checkbox" class="mr-2 bg-white">
                                                <label for="payment"> fattura alla consegna</label>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success col-md-12">Conferma ordine</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container-cart-summery m-3">
                    <div class="card bg-darkLight">
                        <div class="card-header bg-dark">
                            <h3 class="text-orangeBrand">SCONTRINO</h3>
                        </div>
                        <div class="card-body text-white text-center">
                            @foreach($cart as $product)
                                <div class="container-cart-product row justify-content-between">
                                    <div class="col-md-6 text-left">
                                        {{$product->name}}
                                    </div>
                                    <div class="col-md-4 text-right">
                                        {{$product->price}} € x {{$product->qty}}
                                    </div>
                                </div>
                                <div class="separetor-cart-summary"></div>
                            @endforeach
                            <div class="container-cart-total row justify-content-between">
                                <div class="col-md-6 text-left">
                                    <em>IVA</em>
                                </div>
                                <div class="col-md-4 text-right">
                                    <p>{{ $tax }} €</p>
                                </div>
                            </div>
                            <div class="container-cart-total row justify-content-between">
                                <div class="col-md-6 text-left">
                                    <strong>TOTALE</strong>
                                </div>
                                <div class="col-md-4 text-right">
                                    <strong>{{ $total }} €</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection