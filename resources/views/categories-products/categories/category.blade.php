@extends('layouts.header')

@section('content')
    <div class="container-md">
        <div class="row justify-content-center bg-dark p-2">
            <div class="col-md-10 text-center">
                <h2 class="mb-3 text-orangeBrand">{{ $category->title }}</h2>
                <p class="text-white p-1">{{$category->description}}</p>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="container m-3">
                <div class="row justify-content-center">
                    @foreach($category->products as $product)
                        <div class="col-3 col-s">
                            <a class="container-products" href="{{ url('/products/' . $product->id . '/' . $product->name) }}">
                                <div class="block-products m-2 ">
                                    <div class="img">
                                        <img src="{{ asset('storage/' . $product->image) }}">
                                    </div>
                                    <div class="content">
                                        <h3 class="text-orangeBrand">
                                            {{$product->name}}
                                        </h3>
                                        <p class="text-white">
                                            {{$product->price}} €
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
