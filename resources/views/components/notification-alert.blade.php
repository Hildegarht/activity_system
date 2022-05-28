@props(["title", "text", "status"])
@php
if ($status)
    $style = ["background: #16a34a", "color: #f8fafc"];
else
    $style = ["background: #b91c1c", "color: #f8fafc"];
@endphp

<div id="alert" class="notification-alert" style="{{ implode("; ", $style) }}">
    <span class="mi:close"></span>
    <div class="content">
        <div></div>
        <div>
            <div>{{ $title ?? '' }}</div>
            <div>{{ $text ?? '' }}</div>
        </div>
    </div>
</div>

