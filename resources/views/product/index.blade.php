@extends('library.layouts.master')

@section('css')
<style type="text/css">
	.page-link {
		color: red !important;
	}
</style>
@stop

@section('js')
<script type="text/javascript">
	function deleteProduct(id) {
		var option = confirm('Ban chac chan muon xoa danh muc san pham nay khong?')
		if(!option) return

		$.post('{{ route('product_delete') }}', {
			'_token': '{{ csrf_token() }}',
			'id': id
		}, function(data) {
			location.reload()
		})
	}
</script>
@stop

@section('content')
<div class="row">
	<form method="get">
		<div class="col-md-12" style="display: flex; margin-bottom: 20px;">
			<select name="category_id" class="form-control" style="width: 200px;" onchange="$('form').submit()">
				<option value="">-- Select --</option>
				@foreach($categoryList as $item)
					@if($item->id == $category_id)
						<option selected="true" value="{{ $item->id }}">{{ $item->name }}</option>
					@else
						<option value="{{ $item->id }}">{{ $item->name }}</option>
					@endif
				@endforeach
			</select>
			<input type="text" name="s" placeholder="Searching ..." class="form-control" style="width: 160px; margin-left: 10px;">
		</div>
	</form>
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Thumbnail</th>
					<th>Title</th>
					<th>Category Name</th>
					<th>Price</th>
					<th style="width: 50px;"></th>
					<th style="width: 50px;"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($productList as $item)
					<tr>
						<td>{{ ++$count }}</td>
						<td><img src="{{ $item->thumbnail }}" style="width: 160px"></td>
						<td>{{ $item->title }}</td>
						<td>{{ $item->category_name }}</td>
						<td>{{ $item->price }}</td>
						<td><button class="btn btn-warning">Edit</button></td>
						<td><button class="btn btn-danger" onclick="deleteProduct({{ $item->id }})">Delete</button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $productList->links() }}
	</div>
</div>
@stop