<div class="card bg-white rounded-lg shadow-lg p-6 {{ $class }}">
	@if(isset($header))
	<div class="card-header">
		{{ $header }}
	</div>
	@endif
	@if($slot)
		<div class="card-body">
			<p class="card-text">
				{{ $slot }}
			</p>
		</div>
	@endif
</div>