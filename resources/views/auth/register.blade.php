@extends('layout')

@section('title') Register @endsection
@section('style')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection
@section('contents')

@if (session()->has('msg'))
 <div class="alert alert-primary text-center">{{ session('msg') }}</div>
@endif
    


<div class="signup-form">
    <form action="{{ route('registration') }}" method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        @csrf
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="name" placeholder="First Name" required="required">
                    
                </div>
                @error('name'){{ $message }}@enderror
			</div>        	
        </div>
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
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="required">
        </div>        
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
	<div class="hint-text">Already have an account? <a href="{{ route('login') }}">Login here</a></div>
</div>

@endsection