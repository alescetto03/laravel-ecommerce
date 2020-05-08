@extends('layouts.header')

@section('content')
    <div class="container">
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
                        <h3>Novità Costanti</h3>
                        <p>Tutti i nuovi articoli High Tech</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="image-bg" src="{{asset('img/image-bg_2.jpg')}}" width="100%">
                    <div class="carousel-caption">
                        <h3>Allimentiamo Passioni</h3>
                        <p>Tutto ciò che occore per i tuoi Hobbie</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="image-bg" src="{{asset('img/image-bg_3.jpg')}}" width="100%">
                    <div class="carousel-caption">
                        <h3>Fashion & Style</h3>
                        <p>Rimani aggiornato per rimanere Top</p>
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
                <p>Le categorie con più articoli e con più acquiti. Potrebbero fare a caso tuo</p>
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
                                <a href="#">Guarda i Prodotti</a>
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
                                <a href="#">Guarda i Prodotti</a>
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
                                <a href="#">Guarda i Prodotti</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection