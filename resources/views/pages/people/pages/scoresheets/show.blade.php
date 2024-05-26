<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
						{{ $person->first_name }} {{ $person->last_name }}
					</h1>
					<h2 class="text-lg font-bold tracking-tight text-gray-500 sm:text-4xl">
						{{ $scoresheet->activity->name }}
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
									<div class="p-2 flex">
										<a href="{{ route('activities.awards.show', ['activity_slug' => $award->activity->slug, 'award_id' => $award->id]) }}">
											<div class="w-1/3">
												<h2 class="text-xl font-semibold text-gray-900">
													{{ $award->activity->name }}: {{ $award->name }}
												</h2>
											<div>
										</a>
										@if($scoresheet->achievements->contains('award_id', $award->id))
											<div class="text-base text-gray-500 w-1/3">
												{{ $scoresheet->achievements->where('award_id', $award->id)->first()->date }}
											</div>
										@else
											<button type='button' class="btn btn-primary">
												+
											</button>
										@endif
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
