<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
						Create Session
					</h1>
				</div>
				<div class="mx-auto max-w-3xl px-6 lg:px-8 mt-20">
					<div class="w-full bg-white rounded-lg shadow-lg p-6">
						<form action="{{ route('sessions.store') }}" method="POST">
							@csrf
							<div class="mb-4">
								<label for="name" class="block text-sm font-medium text-gray-700">Name</label>
								<input type="text" name="name" id="name" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<label for="code" class="block text-sm font-medium text-gray-700">Session Code</label>
								<select name="code" id="code" class="mt-1 block p-2 border w-full">
									<option selected disabled>Choose...</option>
									<option value='J1'>July First Two-Weeks (J1)</option>
									<option value='J2'>July Second Two-Weeks (J2)</option>
									<option value='A1'>August First Two-Weeks (A1)</option>
									<option value='A2'>August Second Two-Weeks (A2)</option>
									<option value='SW'>Staff Week</option>
								</select>
							<div class="mb-4">
								<label for="start_at" class="block text-sm font-medium text-gray-700">Start Date</label>
								<input type="date" name="start_at" id="start_at" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<label for="end_at" class="block text-sm font-medium text-gray-700">End Date</label>
								<input type="date" name="end_at" id="end_at" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<label for="year" class="block text-sm font-medium text-gray-700">Year</label>
								<input type="number" name="year" id="year" class="mt-1 block p-2 border w-full">
							</div>
							<hr />
							<div class="mb-4">
								<input type="submit" value="Create Session" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</x-color-background-section>
</x-layout>
<script>
	document.getElementById('year').value = new Date().getFullYear();
</script>