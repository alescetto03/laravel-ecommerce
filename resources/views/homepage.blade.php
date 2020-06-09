@extends('layouts.header')

@section('content')
    <div class="container my-4">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="image-bg" src="{{asset('img/image-bg_1.png')}}" width="100%">
                    <div class="carousel-caption">
                        <h3>Novità costanti</h3>
                        <p>Tutti i nuovi articoli high tech</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="image-bg" src="{{asset('img/image-bg_2.jpg')}}" width="100%">
                    <div class="carousel-caption">
                        <h3>Alimentiamo le tue passioni</h3>
                        <p>Tutto ciò che occore per i tuoi hobby</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="image-bg" src="{{asset('img/image-bg_3.jpg')}}" width="100%">
                    <div class="carousel-caption">
                        <h3>Fashion & Style</h3>
                        <p>Rimani aggiornato per rimanere al top</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <div class="crs-button-move">
                    <span class="carousel-control-prev-icon "></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <div class="crs-button-move">
                    <span class="carousel-control-next-icon"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="bg-dark py-4 mt-5">
        <div class="container ">
            <div class="header-topCtg text-center py-1">
                <h2>TOP CATEGORIE</h2>
                <p>Le categorie con il maggior numero di acquisti. Potrebbero fare al caso tuo</p>
            </div>
            <div class="separetor"></div>
            <div class="mr-left-topctg">
                <div class="row my-4 ">
                    <div class="col-sm-4 topCtgs-container">
                        <div class="box">
                            <img class="shadow-lg img-bx" src="{{asset('img/image-topCtgs_1.jpg')}}">
                            <div class="content">
                                <h2>Tecnologia</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Praesent pretium sagittis ipsum sollicitudin gravida.</p>
                                <a href="{{ url('categories/2/Tecnologia') }}">Guarda i Prodotti</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 topCtgs-container">
                        <div class="box">
                            <img class="shadow-lg img-bx" src="{{asset('img/image-topCtgs_2.jpg')}}">
                            <div class="content">
                                <h2>Abbigliamento</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Praesent pretium sagittis ipsum sollicitudin gravida.</p>
                                <a href="{{ url('categories/3/Abbigliamento') }}">Guarda i Prodotti</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 topCtgs-container">
                        <div class="box">
                            <img class="shadow-lg img-bx" src="{{asset('img/image-topCtgs_3.jpg')}}">
                            <div class="content">
                                <h2>Sport</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Praesent pretium sagittis ipsum sollicitudin gravida.</p>
                                <a href="{{ url('categories/4/Sport') }}">Guarda i Prodotti</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark py-4 mt-5">
        <div class="container ">
            <div class="header-topCtg text-center py-1">
                <h2>Nuovi arrivi</h2>
                <p>Ecco i nostri ultimi prodotti belli freschi freschi</p>
            </div>
            <div class="separetor"></div>
            <div class="mr-left-topctg my-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        @foreach($products as $index => $product)
                            <div class="carousel-item bg-dark @if($index == 0) active @endif">
                                <div class="row">
                                    @foreach($product as $prod)
                                        <div class="col-sm-4 topCtgs-container">
                                            <div class="position-absolute badge-container py-2 px-3">
                                                <img src="{{ asset('storage/' . $prod->badges->where('title', 'New')->first()->badge) }}" width="32" height="32">
                                            </div>
                                            <div class="box">
                                                <img class="d-block w-100 h-100 img-fluid" src="{{ asset('storage/' . $prod->image) }}" alt="Product Image" width="32" height="32">
                                                <div class="content">
                                                    <h2>{{ $prod->name }}</h2>
                                                    <p>{{ $prod->price }}</p>
                                                    <a href="{{ url('products/' . $prod->id . '/' . $prod->name) }}">Vai alla pagina del prodotto</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <div class="crs-button-move">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <div class="crs-button-move">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection