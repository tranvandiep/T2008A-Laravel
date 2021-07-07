<!DOCTYPE html>
<html>
<head>
	<title>Attendence Page</title>
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
	<h1 style="text-align: center;">Attendence Today</h1>
	<form method="post" action="{{ route('attendence_save') }}">
		{{ csrf_field() }}
		<input type="text" name="schedule_id" hidden="true" value="{{ $schedule_id }}">
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Roll No</th>
				<th>Student Name</th>
				<th>A</th>
				<th>P</th>
				<th>Note</th>
			</tr>
		</thead>
		<tbody>
		@foreach($studentList as $item)
			<tr>
				<td>{{ ++$index }}</td>
				<td>{{ $item['rollno'] }}</td>
				<td>{{ $item['fullname'] }}</td>
				<td>
					<input type="radio" name="att_{{ $item['id'] }}" class="form-control" value="0" {{ ($item['status'] == 0)?"checked":"" }}>
				</td>
				<td>
					<input type="radio" name="att_{{ $item['id'] }}" class="form-control" value="1"  {{ ($item['status'] == 1)?"checked":"" }}>
				</td>
				<td>
					<input type="text" name="note_{{ $item['id'] }}" class="form-control" value="{{ $item['note'] }}">
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<button class="btn btn-success">Save</button>
	</form>
</div>
</body>
</html>