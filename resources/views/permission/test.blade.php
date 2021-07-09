<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
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
			<h1 style="text-align: center;">Route Management</h1>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Route Name</th>
					</tr>
				</thead>
				<tbody>
@foreach($routeList as $item)
	<tr>
		<td>{{ ++$index }}</td>
		<td><a href="{{ route($item->route_name) }}" target="_blank">{{ $item->route_title }}</a></td>
	</tr>
@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>