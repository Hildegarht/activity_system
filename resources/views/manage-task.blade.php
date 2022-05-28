<x-app-layout>
    @php
        $name = "";
        $desc = "";
        $user_id = "";
        $id = "";
        $task_status = "";


        if(isset($activity)) {
            $id = $activity->id;
            $name = $activity->task_name;
            $desc = $activity->task_description;
            $task_status = strtolower($activity->task_status);
            $user_id = $activity->user->id;
        }
        @endphp
    <div class="container-body-content">
        @if((session("status") || isset($status)))
            <x-notification-alert :status="__($status ?? session('status'))" :title="__($title ?? session('title'))" :text="__($text ?? session('text'))"/>
        @endif
        <div class="cbc-content rounded-md">
            <form method="POST" action="{{ isset($activity) ? route('update_task', ['id' => $id]) : route('add_task') }}">
                @csrf

                <div class="py-2 px-4">
                    <x-label for="task_name" :value="__('Task Name')" />
                    <x-input id="task_name" class="block mt-1 w-full" type="text" name="task_name" value="{{ $name }}" />
                </div>
                <div class="py-2 px-4">
                    <x-label for="task_assignee" :value="__('Task Assignee')" />
                    <select name="task_assignee" style="width: 100%" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">--Select An Option--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="py-2 px-4">
                    <x-label for="task_status" :value="__('Task Status')" />
                    <select name="task_status" style="width: 100%" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">--Select An Option--</option>
                        <option value="Pending" {{ $task_status == "pending" ? 'selected' : '' }}>Pending</option>
                        <option value="Done" {{ $task_status == "done" ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
                <div class="py-2 px-4">
                    <x-label for="task_description" :value="__('Task Description')" />
                    <textarea
                        style="width: 100%;"
                        class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="task_description"
                        placeholder="Write description"
                        id="task_desc"
                        rows="7"
                    >{{ $desc }}</textarea>
                </div>
                <div class="pop-up-task flex justify-end">
                    <button id="add_task"
                        class="button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <p>Submit</p>
                    </button>
                </div>
            </form>
        </div>

    </div>

</x-app-layout>
