@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- Tabella utente -->
                        <table class="table mb-3">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col">{{ __('name') }}</th>
                                <th scope="col">{{ __('surname') }}</th>
                                <th scope="col">{{ __('email') }}</th>
                                <th scope="col">{{ __('address') }}</th>
                                <th scope="col">{{ __('user_id') }}</th>
                                <th scope="col">{{ __('created_at') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->surname }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Tabella carta-->
                        <table class="table mb-3">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col">{{ __('card_number') }}</th>
                                <th scope="col">{{ __('cvv') }}</th>
                                <th scope="col">{{ __('card_intestatary') }}</th>
                                <th scope="col">{{ __('expiration') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ unserialize($order->credit_card)['card_number']}}</td>
                                    <td>{{ unserialize($order->credit_card)['cvv']}}</td>
                                    <td>{{ unserialize($order->credit_card)['card_intestatary']}}</td>
                                    <td>{{ unserialize($order->credit_card)['expiration']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection