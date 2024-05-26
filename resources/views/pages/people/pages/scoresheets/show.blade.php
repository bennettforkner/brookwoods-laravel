<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-8">
						{{ $person->first_name }} {{ $person->last_name }}
					</h1>
					<h2 class="text-lg font-bold tracking-tight text-gray-500 sm:text-4xl">
						@include('components.activity-tag', ['activity' => $scoresheet->activity])
					</h2>
				</div>
				<div class="flex">
					<div class="max-w-7xl px-6 lg:px-8 mt-20 w-full">
						<div class="w-full bg-white rounded-lg shadow-lg p-6 mb-2">
							<h1 class="text-2xl font-semibold text-gray-900">Awards</h1>
						</div>
						<ul class="list-group">
							@foreach($scoresheet->activity->awards as $award)
								<li class="list-group">
									<div class="flex">
										<div class='p-1'>
											<a href="{{ route('activities.awards.show', ['activity_slug' => $award->activity->slug, 'award_id' => $award->id]) }}">
												<h2 class="text-xl font-semibold text-gray-900 p-0">
													{{ $award->name }}
												</h2>
											</a>
										</div>
										@livewire('add-achievement-popup', ['award' => $award, 'scoresheet' => $scoresheet])
										
									</div>
								</li>
							@endforeach
						</ul>
					</div>
					</div>
				</div>
			</div>
		</div>
	</x-color-background-section>
</x-layout>
