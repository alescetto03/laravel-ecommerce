@extends('layouts.header')

@section('content')
    <div class="container-md p-3">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>IL TUO ORDINE E' STATO CONFERMATO</strong> Grazie per aver scelto il nostro servizio!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg class="bi bi-x-circle-fill text-dark" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                        </svg>
                    </button>
                </div>
            @endif
        @endforeach
        <!--if($case == 1)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>IL TUO ORDINE E' STATO CONFERMATO</strong> Grazie per aver scelto il nostro servizio!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <svg class="bi bi-x-circle-fill text-dark" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                    </svg>
                </button>
            </div>
        endif -->
        <div class="row justify-content-center">
            <div class="col-10 container-chronology-text bg-darkLight p-3 text-white">
                <div class="row justify-content-center">
                    <div class="icon-bx col-3 text-right">
                        <svg class="bi bi-clock-history icon text-white" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="content text-center col-9">
                        <h3 class="text-orangeBrand">LA TUA CRONOLOGIA</h3>
                        <p>{{ Auth::user()->name }} questa è la tua cronologia acquistiti.</p>
                    </div>
                </div>
                <div class="d-flex flex-column-reverse">
                    @if($orders->isEmpty())
                        <h4 class="text-center font-weight-normal p-3">Nessun ordinazione</h4>
                    @else
                        @foreach($orders as $order)
                            <div class="row justify-content-center text-dark order-bx p-3 m-2">
                                <div class="col-6 info-order-bx bg-white p-3">
                                    <div class="row justify-content-around">
                                        <div class="col-6">
                                            <strong>Ordine numero:</strong>
                                            <p class="font-max">{{ $order->id }}</p>
                                        </div>
                                        <div class="col-6">
                                            <strong>Ordine effettuato da:</strong>
                                            <p>{{ $order->name }} {{ $order->surname }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 data-order-bx bg-orangeBrand p-3">
                                    <div class="row justify-content-around">
                                        <div class="col-10">
                                            <strong>Ordine effettuato il:</strong>
                                            <p>{{ $order->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection