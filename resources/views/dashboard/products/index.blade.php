@extends('layout')

@section('title')All Products @endsection
@section('contents')

@if (session()->has('msg'))
 <div class="alert alert-primary text-center">{{ session('msg') }}</div>
@endif

<div class="list-group text-center">
    <a href="{{ route('product.create') }}" class="list-group-item list-group-item-action active">
        Create new products
    </a>

  </div>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Created By</th>
      </tr>
    </thead>
    <tbody>
   
        @foreach ($products as $product)
        @can('view',$product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->user->name }}</td>
          </tr>

        @endcan
        @endforeach
    </tbody>
  </table>

@endsection