@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $product->name }}</div>

                    <div class="card-body">
                        <div>{{ $product->name }}</div>
                        <div>{{ $product->description }}</div>
                        <div>{{ $product->price }}</div>
                        <img src="{{ asset('storage/' . $product->image) }}">

                        <form method="POST" action="{{ url('cart/add') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="description" value="{{ $product->description }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="image" value="{{ $product->image }}">
                            <button class="btn btn-primary" type="submit">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection