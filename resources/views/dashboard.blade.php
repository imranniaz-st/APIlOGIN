<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ __('User Activity') }}</h3>

                    <div class="divide-y divide-gray-200">
                        @forelse ($userActivities as $activity)
                            <div class="py-4">
                                <p class="text-sm text-gray-600">{{ $activity->created_at->format('Y-m-d H:i:s') }}</p>
                                <p class="text-md">{{ $activity->activity_data }}</p>
                            </div>
                        @empty
                            <p>{{ __('No activities found.') }}</p>
                        @endforelse
                    </div>

                    {{ $userActivities->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
