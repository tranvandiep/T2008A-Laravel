@extends('library.layouts.master')

@section('css')
@stop

@section('js')
@stop

@section('content')
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add New Book</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="{{ route('library_save') }}">
					{{ csrf_field() }}
					<div class="form-group">
					  <label for="title">Title (<font color="red">*</font>):</label>
					  <input required="true" type="text" class="form-control" id="title" name="title">
					</div>
					<div class="form-group">
					  <label for="price">Price (<font color="red">*</font>):</label>
					  <input required="true" type="text" class="form-control" id="price" name="price">
					</div>
					<div class="form-group">
					  <label for="thumbnail">Thumbnail (<font color="red">*</font>):</label>
					  <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail">
					</div>
					<button type="submit" class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
@stop