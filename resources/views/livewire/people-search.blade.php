<div class="space-y-4">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-14">
        <div class="mx-auto max-w-2xl text-center">
            <input wire:model.live="search" type="text" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Search People" />
        </div>
    </div>
    <div class="flex-col space-y-4">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 lg:grid-cols-4">
            @forelse($people as $person)
                <a href="{{ route('people.show', ['person_id' => $person->id ?? '#']) }}" wire:key="person-{{ $person->id }}">
                    <div class="bg-white rounded-lg shadow-lg">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-900">
                                {{ $person->first_name }} {{ $person->last_name }}
                            </h2>
                        </div>
                    </div>
                </a>
            @empty
                <div class="p-6"></div>
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900">No People Found</h2>
                    <p class="mt-4 text-base text-gray-500">No people found. Please check back later.</p>
                </div>
            @endforelse
        </div>
        <div>{{ $people->links() }}</div>
    </div>
</div>