<!DOCTYPE html>
<html>
<head>
	<title>Roles Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">Permission Management</h1>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Route Title</th>
						<th>Route Name</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
@foreach($permissionList as $item)
	<tr>
		<td>{{ ++$index }}</td>
		<td>{{ $item['route_title'] }}</td>
		<td>{{ $item['route_name'] }}</td>
		<td>
			<select class="form-control" onchange="updatePermission(this, {{ $item['route_id'] }}, {{ $role_id }})">
				<option value="0" {{ $item['status']==0?'selected':'' }}>Disable</option>
				<option value="1" {{ $item['status']==1?'selected':'' }}>Enable</option>
			</select>
		</td>
	</tr>
@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	function updatePermission(that, routeId, roleId) {
		status = $(that).val()

		$.post('{{ route('permission_save') }}', {
			'_token': '{{ csrf_token() }}',
			'route_id': routeId,
			'role_id': roleId,
			'status': status
		}, function(data) {})
	}
</script>
</body>
</html>