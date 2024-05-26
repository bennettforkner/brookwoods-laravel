@php
use App\Providers\Visuals;
$textColor = Visuals::getContrastColor($activity->color ?? '#1F419B');

@endphp
@if($should_link ?? true)
	<a href="{{ route('activities.show', ['activity_slug' => $activity->slug ?? '#']) }}">
@endif
	<span class='d-inline-block py-1 px-2 rounded' style='
		background-color: {{ $activity->color ?? '#1F419B' }};
		color: {{ $textColor }};
	'>{{ $activity->name }}</span>
@if($should_link ?? true)
</a>
@endif