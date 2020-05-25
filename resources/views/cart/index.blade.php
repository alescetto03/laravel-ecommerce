@extends('layouts.header')

@section('content')
    <div class="container-md p-3">
        <div class="row justify-content-between">
            <div class="col-md-7 m-3">
                <h1>CARRELLO</h1>
                <div class="container-cart-dtl-product pl-3">
                    @if($cart->isEmpty())
                        <p class="pre-text">Nessun prodotto nel carrello</p>
                    @else
                        <p class="pre-text">I Tuoi Prodotti nel Dettaglio</p>
                        @foreach($cart as $product)
                            <div class="details-product">
                                <a class="btn btn-brand btn-dtl-product" data-toggle="collapse" href="#{{$product->name}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="content row justify-content-between align-content-center">
                                        <div class="col-auto text-left">
                                            {{$product->name}}
                                        </div>
                                        <div class="qty-product col-auto text-right">
                                            {{$product->qty}}
                                        </div>
                                    </div>
                                </a>
                                <div class="collapse" id="{{$product->name}}">
                                    <div class="card card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $product->image) }}">
                                            </div>
                                            <div class="col-auto">
                                                <p class="text-darkOrangeBrand text-right">PREZZO: {{$product->price}} €</p>
                                                <form class="text-center" method="POST" action="{{ url('cart/update') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->rowId }}">
                                                    <label for="quantity">Quantità</label>
                                                    <input class="login-form-input text-right" type="text" name="quantity" autocomplete="off" value="{{ $product->qty }}">
                                                    <br>
                                                    <buttom class="btn btn-danger">Rimuovi</buttom>
                                                    <button class=" btn btn-warning" type="submit">Aggiorna</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div style="display: none">
                            @foreach($cart as $product)
                                <div>
                                    <span>Nome | {{ $product->name }} </span>
                                    <span> Prezzo | {{ $product->price }}</span>
                                    <form method="POST" action="{{ url('cart/update') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->rowId }}">
                                        <label for="quantity">Quantità</label>
                                        <input type="text" name="quantity" autocomplete="off" value="{{ $product->qty }}">
                                        <button type="submit">Aggiorna</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="container-cart-summery">
                    <div class="card bg-darkLight">
                        <div class="card-header bg-dark">
                            <h3 class="text-orangeBrand">SUMMARY</h3>
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
                                    <strong>TOTALE</strong>
                                </div>
                                <div class="col-md-4 text-right">
                                    <strong>{{ $total }} €</strong>
                                </div>
                            </div>
                            <div class="container-cart-button">
                                <button class="btn btn-brand brd-brand btn-cart">CONFERMA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection