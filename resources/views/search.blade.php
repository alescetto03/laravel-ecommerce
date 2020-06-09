@extends('layouts.header')

@section('content')
    <div class="container my-4">
        @foreach($products as $product)
            <div class="card card-body bg-dark mb-3">
                <div class="row justify-content-around px-4">
                    <p class="text-darkOrangeBrand text-uppercase w-50">{{ $product->name }}</p>
                    <p class="text-darkOrangeBrand text-uppercase w-50 text-right">{{ $product->id }}</p>
                </div>
                <div class="row justify-content-around">
                    <div class="col-md-4 col-cart-prd">
                        <div class="img">
                            <img src="{{ asset('storage/' . $product->image) }}">
                        </div>
                    </div>
                    <div class="col-auto col-cart-prd w-25">
                        <p class="text-darkOrangeBrand text-left">PREZZO: {{ $product->price }} €</p>
                        <p class="text-light">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection