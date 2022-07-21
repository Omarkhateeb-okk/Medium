
<div class="card">
    <div class="card-header">Search by keyword</div>

    <div class="card-body">
        <form action="{{ route('articles.index') }}" method="GET">
            <input type="text" name="query" placeholder="Enter a keyword here..." value="{{ request('query') }}" />
            <input type="submit" class="btn btn-sm btn-info" value="Search" />
        </form>
    </div>
</div>

<br />


<br />

{{--<div class="card">--}}
{{--    <div class="card-header">Tags</div>--}}

{{--    <div class="card-body">--}}
{{--        <ul>--}}
{{--            @foreach ($all_tags as $tag)--}}
{{--                <li>--}}
{{--                    <span><a href="{{ route('articles.index') }}?tag_id={{ $tag->id }}">{{ $tag->name }}</a></span>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}
