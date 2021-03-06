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
                                <a class="btn btn-brand btn-dtl-product" data-toggle="collapse" href="#product{{$product->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="content row justify-content-between align-content-center">
                                        <div class="col-auto text-left">
                                            {{$product->name}}
                                        </div>
                                        <div class="qty-product col-auto text-right">
                                            {{$product->qty}}
                                        </div>
                                    </div>
                                </a>
                                <div class="collapse" id="product{{$product->id}}">
                                    <div class="card card-body">
                                        <div class="row justify-content-around">
                                            <div class="col-md-4 col-cart-prd">
                                                <div class="img">
                                                    <img src="{{ asset('storage/' . $product->options->image) }}">
                                                </div>
                                            </div>
                                            <div class="col-auto col-cart-prd">
                                                <p class="text-darkOrangeBrand text-right">PREZZO: {{$product->price}} ???</p>
                                                <form class="text-center" method="POST" action="{{ url('cart/update') }}">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <input type="hidden" name="id" value="{{ $product->rowId }}">
                                                        <button id="subtract" class="oper-btn">-</button>
                                                        <input id="input_number" class="number-form-input" type="number" name="quantity" autocomplete="off" value="{{ $product->qty }}">
                                                        <button id="add" class="oper-btn">+</button>
                                                    </div>
                                                </form>
                                                <form class="text-center" method="POST" action="{{ url('cart/delete') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->rowId }}">
                                                    <button type="submit" class="btn btn-danger">Rimuovi</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                                        {{$product->price}} ??? x {{$product->qty}}
                                    </div>
                                </div>
                                <div class="separetor-cart-summary"></div>
                            @endforeach
                            <div class="container-cart-total row justify-content-between">
                                <div class="col-md-6 text-left">
                                    <em>IVA</em>
                                </div>
                                <div class="col-md-4 text-right">
                                    <p>{{ $tax }} ???</p>
                                </div>
                            </div>
                            <div class="container-cart-total row justify-content-between">
                                <div class="col-md-6 text-left">
                                    <strong>TOTALE</strong>
                                </div>
                                <div class="col-md-4 text-right">
                                    <strong>{{ $totalTax }} ???</strong>
                                </div>
                            </div>
                            <div class="container-cart-button">
                                <a href="@if($cart->isEmpty()) {{ url('/categories/index') }}  @else {{ url('/checkout') }} @endif">
                                    <button class="btn btn-brand brd-brand btn-cart">@if($cart->isEmpty()) AGGIUNGI DEI PRODOTTI  @else CONFERMA @endif</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection