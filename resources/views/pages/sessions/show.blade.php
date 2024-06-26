@php use \Carbon\Carbon; @endphp
<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
					{{ $session->name }} ({{ $session->code }})
					</h1>
				</div>
			</div>
		</div>
		<div class="mx-auto max-w-2xl px-6 lg:px-8">
			<div class="bg-white rounded-lg shadow-lg mx-auto mb-4">
				<div class="p-4">
					<h2 class="text-xl font-semibold text-gray-900">Dates</h2>
					<p class="mt-4 text-base text-gray-500">{{ Carbon::parse($session->start_at)->format('m/d/Y') }} - {{ Carbon::parse($session->end_at)->format('m/d/Y') }}</p>
					
				</div>
			</div>
			<div class="bg-white rounded-lg shadow-lg mx-auto mb-4">
				<div class="p-4">
					<h2 class="text-xl font-semibold text-gray-900">Signups</h2>
					<p>Use this tool to print a list of campers who are in this session and have earned awards for a specific activity in the past.</p>
					<br/>
					<h4 class="text-md font-semibold text-gray-900">Print Activity Signups List for...</h4>
					<form action="{{ route('pdfs.activity-signups', ['session' => $session]) }}" method="GET" target="_blank" enctype="multipart/form-data">
						<input type="hidden" name="session_id" value="{{ $session->id }}">
						<select name="activity_id" class="mt-4 w-full p-2" onchange="this.parentElement.submit()"">
							<option value="">Select an activity...</option>
							@foreach($activities as $activity)
								<option value="{{ $activity->id }}">{{ $activity->name }}</option>
							@endforeach
						</select>
					</form>
				</div>
			</div>
			<div class="bg-white rounded-lg shadow-lg mx-auto mb-4">
				<div class="p-4">
					<h2 class="text-xl font-semibold text-gray-900">Upload Campers</h2>
					<form action="{{ route('sessions.people-csv.store', ['session' => $session]) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="file" name="csv" class="mt-4 w-full" onchange="this.parentElement.submit()">
						<label for="csv" class="text-sm text-gray-500">Upload a CSV file with the following columns: FirstName, LastName, SerialNumber</label>
					</form>
					<h2 class="text-xl font-semibold text-gray-900 mt-6">Attending Campers</h2>
					<ul class="list-group">
						@foreach($session->people as $person)
							<li class="list-group">
								<div class="flex">
									<div class='p-1'>
										<a href="{{ route('people.show', ['person_id' => $person->id]) }}">
											<h2 class="text-base text-gray-500 font-semibold p-0">
												{{ $person->first_name }} {{ $person->last_name }}
											</h2>
										</a>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
	</x-color_background_section>
</x-layout>