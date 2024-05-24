<x-layout>
    <x-color-background-section>
        <div class="py-6 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Activites
                    </h1>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($activities as $activity)
                    @include('pages.activities.components.activity-block', ['activity' => $activity])
                @empty
                    <div class="bg-white rounded-lg shadow-lg">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-900">No Activities Found</h2>
                            <p class="mt-4 text-base text-gray-500">No activities found. Please check back later.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </x-color_background_section>
</x-layout>