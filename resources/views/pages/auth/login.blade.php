<x-layout>
	<x-color-background-section>
		<div class="py-6 sm:py-10">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-4xl">
						Login
					</h1>
				</div>
				<div class="mx-auto max-w-3xl px-6 lg:px-8 mt-20">
					<div class="w-full bg-white rounded-lg shadow-lg p-6">
						<form action="{{ route('login') }}" method="POST">
							@csrf
							<div class="mb-4">
								<label for="username" class="block text-sm font-medium text-gray-700">Username</label>
								<input type="text" name="username" id="first_name" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<label for="password" class="block text-sm font-medium text-gray-700">Password</label>
								<input type="password" name="password" id="password" class="mt-1 block p-2 border w-full">
							</div>
							<div class="mb-4">
								<input type="submit" value="Create Person" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</x-color-background-section>
</x-layout>