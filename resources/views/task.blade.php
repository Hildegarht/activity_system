<x-app-layout>

    <div class="container py-4 pt-4">
        <div class="flex py-2 px-2">
            <div class="flex-1 px-2">
                <div class="">
                    <span>Task Name: <strong>{{ $activity->task_name }}</strong></span>
                </div>
            </div>
            <div class="flex-1 px-2">
                <div class="">
                    <span>Assigned to: <strong>{{ $activity->user->name }}</strong></span>
                </div>
            </div>
        </div>
        <div style="padding: 4px 16px" class="flex">
            <span style="padding-right: 6px">Task Description: </span> <strong>{{ $activity->task_description }}</strong>
        </div>
        <div class="flex py-2 px-2">
            <div class="flex-1 px-2">
            </div>
            <div class="flex-1 px-2">
                <div class="">
                    <span>Task Status: <strong>{{ strtoupper($activity->task_status) }}</strong></span>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="cbc-content rounded-md">

            @foreach ($activity->history as $history)
                <div style="background-color: #f8fafc" class="rounded-md border py-4 px-4">
                    <h2 style="margin-left: 8px; font-size: 18px">Date Updated: <strong><em>{{ date_format($history->created_at, "Y-m-d") }}</em></strong></h2>
                    <hr style="margin: 8px 0">
                    <div class="flex">
                        <div class="flex-1">
                            <div class="">
                                <span>Previously Task Name: <strong>{{ $history->prev_task_name }}</strong></span>
                            </div>
                            <div class="">
                                <span>Task Name: <strong>{{ $history->task_name }}</strong></span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="">
                                <span>Previously Assigned to: <strong>{{ ($history->prev_assigned_user != null ? $history->prev_assigned_user->name :  'None') }}</strong></span>
                            </div>
                            <div class="">
                                <span>Assigned to: <strong>{{ ($history->assigned_user != null ? $history->assigned_user->name : "None") }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-4">
                        <div class="flex-2">
                            <div class="">
                                <span>Previously Status: <strong>{{ $history->prev_task_status }}</strong></span>
                            </div>
                            <div class="">
                                <span>Status: <strong>{{ $history->task_status }}</strong></span>
                            </div>
                        </div>
                        <div class="flex-3" style="padding-left: 40px">
                            <div>
                                <span>Previous Description: <strong>{{ $history->task_description }}</strong></span>
                            </div>
                            <div class="">
                                <span>Description: <strong>{{ $activity->prev_task_description }}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</x-app-layout>
