@props(['title', 'name', 'date', "id", "status"])

<div class="activity-list-item py-2 px-4 rounded-md">
    <div class="flex justify-between">
        <p class="text-xl px-2 py-2">
            <strong>{{ $title ?? '' }}</strong>
        </p>
        <div class="flex">
            <a href="{{ route('show_task', ["id" => $id]) }}">
                <div style="cursor: pointer;padding: 16px;" class="icon-item">
                    <span class="iconify" data-icon="mi:eye" style="color: green;cursor: pointer;" data-width="17"></span>
                </div>
            </a>
            <a href="{{ route('manage') . "/" .  $id }}">
                <div style="cursor: pointer;padding: 16px;" class="icon-item">
                    <span class="iconify" data-icon="mi:edit" style="color: gray;cursor: pointer;" data-width="17"></span>
                </div>
            </a>
            <a href="{{ route('delete_task', ["id" => $id]) }}">
                <div style="cursor: pointer;padding: 16px;" class="icon-item">
                    <span class="iconify" data-icon="mi:delete" style="color: red;cursor: pointer;" data-width="17"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="flex justify-between">
        <div class="flex">
            <p class="text-sm">Assigned to: <em>{{ $name ?? '' }}</em></p>
        </div>
        <div class="flex">
            <p class="text-sm">Date created: <em>{{ $date ?? '' }}</em></p>
        </div>
    </div>
    <div class="flex justify-between">
        <div class="flex">
            <p class="text-sm">Status: <span>{{ strtoupper($status ?? '') }}</span></p>
        </div>
        <div class="flex">
        </div>
    </div>
</div>
