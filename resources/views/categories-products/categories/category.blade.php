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
                                        <p class="text-white mb-1">
                                            <span class="@if($product->badges()->where('title', 'like', '%off')->get()->isNotEmpty()) text-decoration-line-through @endif mx-1">{{$product->price}} €</span>
                                            @if($product->badges()->where('title', 'like', '%off')->get()->isNotEmpty())
                                                <span class="mx-1">{{ $product->discount($product->badges()->where('title', 'like', '%off')->first()["value"]) }}</span>
                                            @endif
                                        </p>
                                        @if(!$product->badges->where('title', 'New')->isEmpty())
                                            <p class="text-white mb-1">
                                                <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <span>Nuovo!</span>
                                                <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            </p>
                                        @endif
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
