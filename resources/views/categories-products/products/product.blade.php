@extends('layouts.header')

@section('content')
    <div class="container-md p-3">
        <div class="row justify-content-center">
            <div class="col-md-6 container-img-product">
                <div class="img">
                    <img src="{{ asset('storage/' . $product->image) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="container m-3">
                    <div class="container-product">
                        <h2 class="text-orangeBrand font-weight-bold">
                            {{$product->name}}
                        </h2>
                        <div class="content d-flex">
                            <p class="font-weight-bold">DESCRIZIONE: </p>
                            <p class="description-content ml-2">
                                {{$product->description}}
                            </p>
                        </div>
                        <div class="content d-flex">
                            <p class="font-weight-bold">PREZZO*: </p>
                            <p class="price-content font-italic ml-2">
                                {{$product->price}} €
                            </p>
                        </div>
                    </div>

                    <form method="POST" action="{{ url('cart/add') }}" class="mt-4">
                        @csrf
                        <p class="content nota m-0">
                            *IVA esclusa
                        </p>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="description" value="{{ $product->description }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="image" value="{{ $product->image }}">
                        <button class="btn btn-brand mt-0" type="submit">Aggiungi al carrello</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection