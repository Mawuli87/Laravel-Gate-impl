@extends('layout')

@section('title') Register @endsection
@section('contents')

<div class="list-group text-center">
    <a href="{{ route('user.create') }}" class="list-group-item list-group-item-action active">
        Create User
    </a>

  </div>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Roles</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach ($user->roles as $role )
                    <span class="badge bg-success">{{ $role->name }}</span>
                @endforeach
            </td>
          </tr>
        @endforeach
      
      
    </tbody>
  </table>

@endsection