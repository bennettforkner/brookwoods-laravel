<x-layout>
    <x-color-background-section>
        <div class="py-6 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        @include('components.activity-tag', ['activity' => $activity])
                    </h1>
                    <p class="mt-4 text-base text-gray-500 mb-3">{{ $activity->description }}</p>
                    @livewire('activity-awards-history-popup', ['activity' => $activity])
                </div>
            </div>
            <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-20 flex">
                <div class="lg:w-1/3 w-1/2">
                    <x-card :class="'mx-3 bg-white rounded-lg shadow-lg p-6'">
                        <h2 class="lg:text-xl text-sm font-semibold text-gray-900 pb-2">Awards</h2>
                        <ul class="list-group">
                            @foreach($activity->awards as $award)
                                <li class="list-group-item">
                                    <a href="{{ route('activities.awards.show', ['activity_slug' => $award->activity->slug, 'award_id' => $award->id]) }}">
                                        <div>
                                            <h3 class="lg:text-lg text-xs font-semibold text-gray-900">
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
                <div class="lg:w-2/3 w-1/2">
                    <x-card :class="'bg-white rounded-lg shadow-lg p-6'">
                        <h2 class="lg:text-xl text-sm font-semibold text-gray-900 pb-2">Award Earners (Current Year)</h2>
                        <ul class="list-group">
                            @foreach($scoresheets as $scoresheet)
                                <li class="list-group-item">
                                    <a href="{{ route('people.show', ['person_id' => $scoresheet->person->id]) }}">
                                        <div class="flex">
                                            <div class="lg:p-1">
                                                <h3 class="lg:text-lg text-xs font-semibold text-gray-900">
                                                    {{ $scoresheet->person->first_name }} {{ $scoresheet->person->last_name }}
                                                </h3>
                                            </div>
                                            <div class="lg:p-1 pl-2">
                                                <p class="lg:text-lg text-xs text-base text-gray-500">
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