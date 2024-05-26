<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
						Create Person
					</h1>
				</div>
				<div class="mx-auto max-w-3xl px-6 lg:px-8 mt-20">
					<div class="w-full bg-white rounded-lg shadow-lg p-6">
						<form action="{{ route('people.store') }}" method="POST">
							@csrf
							<div class="mb-4">
								<label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
								<input type="text" name="first_name" id="first_name" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
								<input type="text" name="last_name" id="last_name" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
								<input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
								<select name="gender" id="gender" class="mt-1 p-2 border w-full">
									<option selected disabled>Choose...</option>
									<option value='M'>Male</option>
									<option value='F'>Female</option>
								</select>
							</div>
							<hr />
							<div>
								<label for="scoresheets_comma_separated" class="block text-lg font-medium text-gray-700">Activity Scoresheets</label>
								<input type="hidden" name="scoresheets_comma_separated" id="scoresheets_comma_separated" value="">
								<div class="mb-4">
									@foreach($activities as $activity)
										<div class='w-1/3 d-inline-block'>
											<input type='checkbox' name="activity_{{ $activity->id }}" id="activity_{{ $activity->id }}" class="mt-1 p-2 border" />
											&nbsp;<label for="activity_{{ $activity->id }}" class="inline-block text-sm font-medium text-gray-700">{{ $activity->name }}</label>
										</div>
									@endforeach
								</div>
							</div>
							<div class="mb-4">
								<input type="submit" value="Create Person" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</x-color-background-section>
</x-layout>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const scoresheets = document.querySelectorAll('input[name^="activity_"]');
		const scoresheetsCommaSeparated = document.getElementById('scoresheets_comma_separated');
		scoresheets.forEach(scoresheet => {
			scoresheet.addEventListener('change', function() {
				const selectedScoresheets = Array.from(scoresheets).filter(scoresheet => scoresheet.checked).map(scoresheet => scoresheet.id.replace('activity_', ''));
				scoresheetsCommaSeparated.value = selectedScoresheets.join(',');
			});
		});
	});
</script>