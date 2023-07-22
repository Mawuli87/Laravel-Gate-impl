@extends('layout')
@section('title') Home Page @endsection
@section('contents') 

@if (session()->has('msg'))
 <div class="alert alert-primary text-center">{{ session('msg') }}</div>
@endif

<span class="text-black ">{{ auth()->user() != null ? auth()->user()->name : "Guest" }}</span>
@endsection
