@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @foreach($cart as $product)
                            <div>
                                <span>Nome | {{ $product->name }} </span>
                                <div> Prezzo | {{ $product->price * $product->qty }}</div>
                                <img src="{{ asset('storage/' . $product->options->image) }}">
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
                    <div class="card-body">
                        <div>
                            Totale {{ $total }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection