@extends('layouts.header')

@section('content')
    <div class="container-md">
        <div class="row justify-content-center bg-dark p-2">
            <div class="col-md-10 text-center">
                <h2 class="mb-3 text-orangeBrand">TUTTE LE CATEGORIE</h2>
                <p class="text-white p-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="container m-3">
                <div class="row justify-content-center">
                    @foreach($categories as $category)
                        <div class="col-4 col-rsp-sm">
                            <div class="container-category m-2">
                                <div class="row justify-content-center">
                                    <div class="col-category content col-auto">
                                        <h2 class="font_s text-orangeBrand">
                                            {{$category->title}}
                                        </h2>
                                        <p class="text-white text-left p-2">
                                            {{$category->description}}
                                        </p>
                                        <a href="{{ $category->id . '/' . $category->title }}">
                                            Guarda i prodotti
                                        </a>
                                    </div>
                                    <div class="col-category col-auto img">
                                        <img src="{{ asset('storage/' . $category->image) }}" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection