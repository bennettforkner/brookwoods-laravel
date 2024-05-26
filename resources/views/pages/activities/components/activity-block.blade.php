@php
	use App\Providers\Visuals;
	$contrastColor = Visuals::getContrastColor($activity->color);
@endphp
<a href="{{ route('activities.show', ['activity_slug' => $activity->slug ?? '#']) }}">
	<div class="bg-white rounded-lg shadow-lg" style='background-color: {{ $activity->color }}'>
		<div class="p-6" style="height: 150px;">
			<h2 class="text-xl font-semibold" style="color: {{ $contrastColor }};">{{ $activity->name }}</h2>
			<p class="d-inline-block mt-4 text-base text-gray-500 mw-50 text-truncate" style="color: {{ $contrastColor }}aa;">{{ $activity->description }}</p>
		</div>
	</div>
</a>