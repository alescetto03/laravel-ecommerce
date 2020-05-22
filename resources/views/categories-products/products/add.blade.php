@extends('layouts.header')

@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="nav linkCrud">
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-orangeBrand" href="{{ url('products/add') }}">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products/read') }}">READ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('products/update') }}">UPDATE</a>
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
                    <svg class="bi bi-pencil-square iconAdd" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="p-2 text-center">
                    <h2 class="text-orangeBrand">CREATE</h2>
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
                <form method="POST" action="{{ url('/products/add') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Titolo') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="login-form-input border-dark form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Descrizione') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="login-form-input border-dark form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Quantità') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="quantity" type="text" class="login-form-input border-dark form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Prezzo') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="login-form-input border-dark form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class=" text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{__('Immagine')}}</strong>
                        </label>

                        <div class="col-md-6">
                            <input id="image" type="file" class=" @error('description') is-invalid @enderror py-1" name="image" required>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="text-orangeBrand col-md-4 col-form-label text-md-right">
                            <strong>{{ __('Categoria') }}</strong>
                        </label>

                        <div class="col-md-6">
                            <select id="category" class="form-control login-form-input border-dark" name="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Aggiungi') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
