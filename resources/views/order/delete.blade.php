@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cancella</div>
                    <div class="card-body">
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                        <form method="POST" action="{{ url('/order/delete') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="category" class="col-form-label text-md-right">
                                    <strong>{{ __('Ordini') }}</strong>
                                </label>
                                <select id="order" class="form-control" name="order">
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->created_at->format('d/m/Y - H:i') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"> {{ __('Rimuovi') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection