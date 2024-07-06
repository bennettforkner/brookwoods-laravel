<div>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th {
			background-color: #f2f2f2;
			border: 1px solid #dddddd;
			text-align: left;
			padding: 4px;
		}
		td {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 4px;
		}
	</style>
	<table>
		<thead>
			<tr>
				<th colspan=4 style="font-size: 2rem;text-align: center;">Activity Achievements Report for {{ $activity->name }}&emsp;|&emsp;{{ $startDate }} - {{ $endDate }}</th>
			</tr>
			<tr style='border-width: 0px;height: 1rem;'>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Achievement Name</th>
				<th>Achievement Date</th>
			</tr>
			@foreach($achievements as $achievement)
				<tr>
					<td>{{ $achievement->scoresheet->person->first_name }}</td>
					<td>{{ $achievement->scoresheet->person->last_name }}</td>
					<td>{{ $achievement->award->name }}</td>
					<td>{{ $achievement->date }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script>
	window.print();
</script>