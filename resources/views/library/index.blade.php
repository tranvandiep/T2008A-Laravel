@extends('library.layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/library.css') }}">
@stop

@section('js')
<script type="text/javascript" src="{{ asset('js/library.js') }}"></script>
@stop

@section('content')
	<h1 style="text-align: center;">Welcome to learn PHP/Laravel</h1>

	<img src="{{ asset('photos/library/2.jpg') }}" style="width: 500px" />
	<br/>
	<div class="row">
		@foreach($bookList as $book)
			<div class="col-md-3">
				<img src="{{ $book['thumbnail'] }}" style="width: 100%">
				<p style="color: yellow">{{ $book['title'] }}</p>
				<p style="color: red">{{ $book['price'] }} VND</p>
			</div>
		@endforeach
	</div>
@stop