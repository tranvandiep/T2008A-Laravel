<!DOCTYPE html>
<html>
<head>
	<title>Schedule Page</title>
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
	<h1 style="text-align: center;">Schedule</h1>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Subject Name</th>
				<th>Teacher Name</th>
				<th>Begin Date</th>
				<th>End Date</th>
				<th style="width: 50px"></th>
				<th style="width: 50px"></th>
			</tr>
		</thead>
		<tbody>
		@foreach($scheduleList as $item)
			<tr>
				<td>{{ ++$index }}</td>
				<td>{{ $item->subject_name }}</td>
				<td>{{ $item->teacher_name }}</td>
				<td>{{ $item->begin_date }}</td>
				<td>{{ $item->end_date }}</td>
				<td>
					@if($frametimeToday == $item->frametime && $currentTime >= $item->starttime && $currentTime <= $item->endtime)
					<a href="{{ route('attendence_index') }}?schedule_id={{ $item->id }}"><button class="btn btn-warning">Attendence</button></a>
					@endif
				</td>
				<td><button class="btn btn-success">Statistic</button></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>