@extends('layouts.header')

@section('content')
    <div class="container-lg m-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Edit product {{ $product->name }}</div>

                    <div class="card-body p-4">
                        <p>Change user as:</p>
                        <form action="{{ url('products/badges/edit/{id}') }}" method="post">
                            @csrf
                            <input type="hidden" name="product" value="{{ $product->id }}">
                            @foreach($badges as $badge)
                                <div class="form-check">
                                    <input type="checkbox" class="" name="badges[]" value="{{ $badge->id }}"
                                           @if($product->badges->pluck('id')->contains($badge->id)) checked @endif>
                                    <label>{{ $badge->title }}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-warning my-3">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection