<div>
	<x-layout>
		<x-color-background-section>
			<div class="py-6 sm:py-10">
				<div class="mx-auto max-w-7xl px-6 lg:px-8">
					<div class="mx-auto max-w-2xl text-center mb-10">
						<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
							People
						</h1>
					</div>
					<div class="text-center mb-12">
						<a href="{{ route('people.create')}}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
							Create New Person
						</a>
					</div>
					<livewire:people-search />
				</div>
			</div>
		</x-color-background-section>
	</x-layout>
</div>