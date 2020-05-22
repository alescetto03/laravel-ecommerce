@extends('layouts.header')

@section('content')
    <div class="container-lg m-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Edit user {{ $user->name }}</div>

                    <div class="card-body p-4">
                        <p>Change user as:</p>
                        <form action="{{ route('admin.users.update', $user) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" class="" name="roles[]" value="{{ $role->id }}"
                                           @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label>{{ $role->role_name }}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-warning my-3">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection