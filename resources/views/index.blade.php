<x-app-layout>
    <div class="container-body-content">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('All') }}
            </x-nav-link>
            {{-- <x-nav-link :href="route('dashboard')" :active="false">
                {{ __('In Progress') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard')" :active="false">
                {{ __('Completed') }}
            </x-nav-link> --}}
        </div>

        <div class="cbc-content rounded-md">
            <div class="activity-list">
                @foreach ($activities as $activity)
                    <x-activity-item
                        :id="__($activity->id)"
                        :title="__($activity->task_name)"
                        :name="__($activity->user->name)"
                        :status="__($activity->task_status)"
                        :date="__($activity->created_at->format('d-m-Y'))"
                    />
                @endforeach
            </div>
            {{-- <!-- <p>Today</p> -->
            <div class="cbc-content-image">
                <img src="images/chill.png" alt="chill" srcset="">
                <p class="header">Woohoo, inbox zero!</p>
                <p class="body">Tasks and Reminders that are scheduled for Today will appear here.</p>
            </div> --}}
        </div>

    </div>
</x-app-layout>
