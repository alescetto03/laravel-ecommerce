@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $category->title }}</div>

                    <div class="card-body">
                        @foreach($category->products as $product)
                            <div class="my-4">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail">
                                <a href="{{ url('/products/' . $product->id . '/' . $product->name) }} ">{{ $product->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
