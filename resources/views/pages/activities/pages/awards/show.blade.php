<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
						{{ $award->name }}
					</h1>
					<p class="mt-4 text-base text-gray-500">{{ $award->description }}</p>
				</div>
				<div class="mx-auto max-w-3xl px-6 lg:px-8 mt-20">
					<div class="w-full bg-white rounded-lg shadow-lg p-6">
						<h2 class="text-xl font-semibold text-gray-900">Earners This Year</h2>
						<ul class="list-group">
							@foreach($award->achievements as $achievement)
								<li class="list-group-item">
									<a href="#">
										<div class="p-2">
											<h2 class="text-xl font-semibold text-gray-900">
												{{ $achievement->person->first_name }} {{ $achievement->person->last_name }}
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
				</div>
			</div>
		</div>
	</x-color-background-section>
</x-layout>