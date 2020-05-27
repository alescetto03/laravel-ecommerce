@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @foreach($orders as $order)
                    <span>{{ $order->id }}</span>
                    <span>{{ $order->name }}</span>
                    <span>{{ $order->surname }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endsection