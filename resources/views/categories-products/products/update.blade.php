@extends('layouts.header')

@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="nav linkCrud">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('products/add') }}">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products/read') }}">READ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-orangeBrand" href="{{ url('products/update') }}">UPDATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products/delete') }}">DELETE</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 separetorCrud"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 m-4">
                <div class="imgBox p-3 text-center">
                    <svg class="bi bi-arrow-counterclockwise iconAdd" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.83 6.706a5 5 0 00-7.103-3.16.5.5 0 11-.454-.892A6 6 0 112.545 5.5a.5.5 0 11.91.417 5 5 0 109.375.789z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M7.854.146a.5.5 0 00-.708 0l-2.5 2.5a.5.5 0 000 .708l2.5 2.5a.5.5 0 10.708-.708L5.707 3 7.854.854a.5.5 0 000-.708z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="p-2 text-center">
                    <h2 class="text-orangeBrand">UPDATE</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->
                <form method="POST" action="{{ url('/products/update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="product" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Prodotto') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <select id="product" class="login-form-input border-dark form-control" name="product">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Nome') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="login-form-input border-dark form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Descrizione') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="login-form-input border-dark form-control " name="description" value="{{ old('description') }}" autocomplete="description" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Prezzo') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="login-form-input border-dark form-control" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{__('Immagine')}}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="py-1" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_id" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Categoria') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <select id="category_id" class="login-form-input border-dark form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Modifica') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
