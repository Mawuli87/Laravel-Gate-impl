@extends('layout')

@section('title') Create product @endsection
@section('style')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection
@section('contents')

@if (session()->has('msg'))
 <div class="alert alert-primary text-center">{{ session('msg') }}</div>
@endif
    


<div class="signup-form">
    <form action="{{ route('product.store') }}" method="post">
		<h2>Create new Product</h2>
		<hr>
        @csrf
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="name" placeholder="Name" required="required">
      
                </div>
                @error('name'){{ $message }}@enderror
			</div>        	
        </div>
        @csrf
        <div class="form-group">
        	<input type="number" class="form-control" name="price" placeholder="Price" required="required">
            @error('price'){{ $message }}@enderror
        </div>
        @csrf
		<div class="form-group">
            <input type="number" class="form-control" name="quantity" placeholder="Quantity" required="required">
            @error('quantity'){{ $message }}@enderror
        </div>
		

    
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>


    </form>
	<div class="hint-text">All Products? <a href="{{ route('product.index') }}">Login here</a></div>
</div>

@endsection