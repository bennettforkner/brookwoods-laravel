<a href="{{ route('activities.show', ['activity_id' => $activity->id]) }}">
	<div class="bg-white rounded-lg shadow-lg">
		<div class="p-6" style="height: 150px;">
			<h2 class="text-xl font-semibold text-gray-900">{{ $activity->name }}</h2>
			<p class="d-inline-block mt-4 text-base text-gray-500 mw-50 text-truncate">{{ $activity->description }}</p>
		</div>
	</div>
</a>