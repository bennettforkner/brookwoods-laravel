<x-layout>
    <x-color-background-section>
        <div class="py-6 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        {{ $activity->name }}
                    </h1>
                    <p class="mt-4 text-base text-gray-500">{{ $activity->description }}</p>
                </div>
            </div>
            <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-20 flex">
                <div class="w-1/3">
                    <x-card :class="'mx-3 bg-white rounded-lg shadow-lg p-6'">
                        <h2 class="text-xl font-semibold text-gray-900">Awards</h2>
                        <ul class="list-group">
                            @foreach($activity->awards as $award)
                                <li class="list-group-item">
                                    <a href="{{ route('activities.awards.show', ['activity_slug' => $award->activity->slug, 'award_id' => $award->id]) }}">
                                        <div class="p-2">
                                            <h3 class="text-l font-semibold text-gray-900">
                                                {{ $award->name }}
                                                @if($award->short_name)
                                                    [<span class='text-gray-800'>{{ $award->short_name }}</span>]
                                                @endif
                                            </h3>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </x-card>
                </div>
                <div class="w-2/3">
                    <x-card :class="'bg-white rounded-lg shadow-lg p-6'">
                        <h2 class="text-xl font-semibold text-gray-900">Award Earners</h2>
                        <ul class="list-group">
                            @foreach($scoresheets as $scoresheet)
                                <li class="list-group-item">
                                    <a href="{{ route('people.show', ['person_id' => $scoresheet->person->id]) }}">
                                        <div class="flex">
                                            <div class="p-2">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    {{ $scoresheet->person->first_name }} {{ $scoresheet->person->last_name }}
                                                </h3>
                                            </div>
                                            <div class="p-2">
                                                <p class="text-base text-gray-500">
                                                    {{ $scoresheet?->highest_achievement?->award?->name ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </x-card>
                </div>
            </div>
        </div>
    </x-color-background-section>
</x-layout>