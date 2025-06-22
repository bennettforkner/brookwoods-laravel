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
				<th colspan=4 style="font-size: 2rem;text-align: center;">Activity Signups for {{ $activity->name }} - {{ $session->year }} {{ $session->name }}</th>
			</tr>
			<tr style='border-width: 0px;height: 1rem;'>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Highest Achievement</th>
				<th>Achievement Date</th>
			</tr>
			@foreach($scoresheets as $scoresheet)
				<tr>
					<td>{{ $scoresheet->person->first_name }}</td>
					<td>{{ $scoresheet->person->last_name }}</td>
					@php $highest_achievement = $scoresheet->highest_achievement; @endphp
					<td>{{ $highest_achievement?->award ? ($highest_achievement?->award?->name . "(" . $highest_achievement?->award?->short_name . ")") : '' }}</td>
					<td>{{ $highest_achievement?->date ?? '' }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script>
	window.print();
</script>