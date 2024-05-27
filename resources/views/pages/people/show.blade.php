<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
						{{ $person->first_name }} {{ $person->last_name }}
					</h1>
					<p class="mt-4 text-base text-gray-500">{{ $person->email }}</p>
				</div>
				<div class="flex">
					<div class="max-w-3xl px-6 lg:px-8 mt-20 w-1/3">
						<div class="w-full bg-white rounded-lg shadow-lg p-6 mb-2">
							<h1 class="text-2xl font-semibold text-gray-900">Recent Awards</h1>
						</div>
						<ul class="list-group">
							@php
								// Sort the achievements by date and award order, then take the top 5
								$achievements = $person->achievements->sortByDesc(fn ($achievement) =>
									$achievement->date . '-' . $achievement->award->order
								)->take(5);
							@endphp
							@foreach($achievements as $achievement)
								<li class="list-group">
									<a href="{{ route('activities.awards.show', ['activity_slug' => $achievement->award->activity->slug, 'award_id' => $achievement->award->id]) }}">
										<div class="p-2">
											<h2 class="text-xl font-semibold text-gray-900">
												@include('components.activity-tag', ['activity' => $achievement->award->activity]) {{ $achievement->award->name }}
											</h2>
											<div class="text-base text-gray-500">
												{{ $achievement->date }}
											</div>
										</div>
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="max-w-3xl px-6 lg:px-8 mt-20 w-1/3">
						<div class="w-full bg-white rounded-lg shadow-lg p-6 mb-2">
							<h1 class="text-2xl font-semibold text-gray-900">Activity Scoresheets</h1>
						</div>
						<ul class="list-group">
							@foreach($person->scoresheets as $scoresheet)
								<li class="list-group-item">
									<a href="{{ route('people.scoresheets.show', ['person_id' => $person->id, 'scoresheet_id' => $scoresheet->id]) }}">
										<div class="p-2">
											<h2 class="text-xl font-semibold text-gray-900">
												@include('components.activity-tag', ['activity' => $scoresheet->activity, 'should_link' => false])
											</h2>
											@if($scoresheet?->highest_achievement)
												<div class="text-base text-gray-500">
													&#8593; {{ $scoresheet->highest_achievement->award?->name ?? '' }}
												</div>
											@endif
										</div>
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="max-w-3xl px-6 lg:px-8 mt-20 w-1/3">
						<div class="w-full bg-white rounded-lg shadow-lg p-6 mb-2">
							<h1 class="text-2xl font-semibold text-gray-900">Attended Sessions</h1>
						</div>
						<ul class="list-group">
							@foreach($person->attended_sessions as $session)
								<li class="list-group-item">
									<a href="{{ route('sessions.show', ['session' => $session->id]) }}">
										<div class="p-2">
											<div class="text-base text-gray-500">
												{{ $session->naem }}
											</div>
										</div>
									</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</x-color-background-section>
</x-layout>