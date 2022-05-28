<section class="container-sidebar">

    <form method="POST" action="{{ route('find_task') }}">
        @csrf

        <div class="container-sidebar-search mt-4">
            <span
                class="iconify"
                data-icon="mi:search"
                style="
                    color: #ccc;
                    left: 45px;
                    position: absolute;
                "
                data-width="17"
            ></span>
            <input
                type="date"
                name="date_from"
                id="date_from"
                placeholder=""
            />
        </div>
        <div class="container-sidebar-search">
            <span
                class="iconify"
                data-icon="mi:search"
                style="
                    color: #ccc;
                    left: 45px;
                    position: absolute;
                "
                data-width="17"
            ></span>
            <input
                type="date"
                name="date_to"
                id="date_to"
                placeholder=""
            />
        </div>
        <hr>
        <button style="width: calc(100% - 8px); margin: 8px 4px !important"
            class="button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            <span
                class="iconify"
                data-icon="mi:search"
                style="color: #ccc;margin: 0 8px"
                data-width="17"
            ></span>
            <p>Search</p>
        </button>
        </a>
        <hr>
    </form>

    <div class="container-sidebar-sidebar search_result">
        @if(session("status") && session("status") == "TASK_SEARCH")
            @foreach (session("response") as $activity)
                <a href="{{ route('show_task', ['id' => $activity->id]) }}"><div class="rounded-sm border px-2 py-2 search-item">
                    <h3>{{ $activity->task_name }}</h3>
                    <p></p>
                    <div style="text-align: right">
                        <p style="font-size: 14px"><em>{{ $activity->created_at }}</em></p>
                        <p style="font-size: 14px"><em>{{ $activity->task_status }}</em></p>
                    </div>
                </div></a>
            @endforeach
        @else
            <div class="rounded-sm border px-2 py-2 text-center" style="color: #94a3b8">
                <h3>No Search Data...</h3>
            </div>
        @endif
    </div>
    <div class="container-sidebar-footer"></div>
</section>
