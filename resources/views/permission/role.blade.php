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
						<th>Role Name</th>
						<th style="width: 160px;"></th>
					</tr>
				</thead>
				<tbody>
@foreach($roleList as $item)
	<tr>
		<td>{{ ++$index }}</td>
		<td>{{ $item->role_name }}</td>
		<td><a href="{{ route('permission_setting') }}?id={{ $item->id }}"><button class="btn btn-warning">Setting Permission</button></a></td>
	</tr>
@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>