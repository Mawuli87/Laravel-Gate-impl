@extends('layout')
@section('title') Login @endsection
@section('style')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection
@section('contents')

@if (session()->has('msg'))
 <div class="alert alert-primary text-center">{{ session('msg') }}</div>
@endif
    


<div class="signup-form">
    <form action="{{ route('loging') }}" method="post">
		<h2>Login</h2>
		<p>Please fill in this form to sign in!</p>
		<hr>
       
        @csrf
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
            @error('email'){{ $message }}@enderror
        </div>
        @csrf
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            @error('password'){{ $message }}@enderror
        </div>
		        
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
        </div>
    </form>
	<div class="hint-text">do not have an account? <a href="{{ route('register') }}">Register here</a></div>
</div>

@endsection