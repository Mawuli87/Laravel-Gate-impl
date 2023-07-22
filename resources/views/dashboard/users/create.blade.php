@extends('layout')

@section('title') Create user @endsection
@section('style')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection
@section('contents')

@if (session()->has('msg'))
 <div class="alert alert-primary text-center">{{ session('msg') }}</div>
@endif
    


<div class="signup-form">
    <form action="{{ route('user.store') }}" method="post">
		<h2>Create new User</h2>
		<p>Please fill in this form to create a new user!</p>
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
        
        
        <select multiple name="roles[]" class="form-select mb-2" aria-label="Default select example">
            <option selected>Open this to select</option>
            @foreach ($roles as $role )
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
           
            
        
        </select>
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Create User</button>
        </div>


    </form>
	<div class="hint-text">Already have an account? <a href="{{ route('login') }}">Login here</a></div>
</div>

@endsection