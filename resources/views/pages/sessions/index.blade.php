<x-layout>
    <x-color-background-section>
        <div class="py-6 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Sessions
                    </h1>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-2xl px-6 lg:px-8">
				@forelse($sessions->sortByDesc('start_date') as $session)
				<a href="{{ route('sessions.show', ['session' => $session]) }}">
					<div class="bg-white rounded-lg shadow-lg mx-auto mb-4">
						<div class="p-6">
							<h2 class="text-xl font-semibold text-gray-900">{{ $session->name }}</h2>
							<p class="mt-4 text-base text-gray-500">{{ $session->description }}</p>
							<p class="mt-4 text-base text-gray-500">{{ \Carbon\Carbon::parse($session->start_at)->format('m/d') }} - {{ \Carbon\Carbon::parse($session->end_at)->format('m/d') }}, {{ \Carbon\Carbon::parse($session->end_at)->format('Y') }}</p>
						</div>
					</div>
				</a>
				@empty
					<div class="p-6">
						<h2 class="text-xl font-semibold text-gray-900">No Activities Found</h2>
						<p class="mt-4 text-base text-gray-500">No activities found. Please check back later.</p>
					</div>
				@endforelse
        </div>
    </x-color_background_section>
</x-layout>