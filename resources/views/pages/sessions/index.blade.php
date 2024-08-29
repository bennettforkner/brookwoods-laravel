@php use \Carbon\Carbon; @endphp
<x-layout>
    <x-color-background-section>
        <div class="py-6 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-10">
                    <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Sessions
                    </h1>
                </div>
				<div class="text-center mb-12">
					<a href="{{ route('sessions.create')}}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
						+ Create New Session
					</a>
				</div>
            </div>
        </div>
        <div class="mx-auto max-w-2xl px-6 lg:px-8">
				@php
					$sessions = $sessions->sortByDesc(fn($session) => Carbon::parse($session->start_at));
				@endphp
				@forelse($sessions as $session)
				@php
					$isCurrent = $session->isCurrent();
				@endphp
				<a href="{{ route('sessions.show', ['session' => $session]) }}">
					<div class="bg-white rounded-lg shadow-lg mx-auto mb-4"
					@if ($isCurrent)
						style='background-color: #aaddaa;'
					@endif
					>
						<div class="p-6" style='position:relative;'>
							<h2 class="text-xl font-semibold text-gray-900">{{ $session->name }}</h2>
							@if($isCurrent)
								<div style='position:absolute;top:10px;right:15px;'>* Current</div>
							@endif
							<p class="mt-4 text-base text-gray-500">{{ $session->description }}</p>
							<p class="mt-4 text-base text-gray-500">{{ $session->start_at->format('m/d') }} - {{ $session->end_at->format('m/d') }}, {{ $session->end_at->format('Y') }}</p>
						</div>
					</div>
				</a>
				@empty
					<div class="p-6">
						<h2 class="text-xl font-semibold text-gray-900">No Sessions Found</h2>
						<p class="mt-4 text-base text-gray-500">No sessions found. Please check back later.</p>
					</div>
				@endforelse
        </div>
    </x-color_background_section>
</x-layout>