@extends('layouts.header')

@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="nav linkCrud">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('categories/add') }}">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-orangeBrand" href="{{ url('categories/read') }}">READ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('categories/update') }}">UPDATE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('categories/delete') }}">DELETE</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 separetorCrud"></div>
        </div>
        <div class="row justify-content-center m-4">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">Categories</div>

                    <div class="card-body">

                        <table class="table-UserManagement table table-hover table-striped">
                            <thead>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->description }}</td>
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