@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Aggiungi categoria') }}</div>

                    <div class="card-body">
                        @foreach($categories as $category)
                            <div class="my-4">
                                <img src="{{ asset('storage/' . $category->image) }}" class="img-thumbnail">
                                <a href="{{ $category->id . '/' . $category->title }}">{{ $category->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection