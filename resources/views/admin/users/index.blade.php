@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    @if($user->id !== auth()->user()->id)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->surname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    {{ $role->role_name, " " }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id ) }}"><button type="button" class="btn btn-primary float-left w-50">Edit</button></a>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-warning float-left w-50">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection