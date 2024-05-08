<li>
    {{ $video->title }}

    <form action="/deletefromplaylist" method="post">
        @csrf
        <input type="hidden" name="pid" value="{{ $playlist->id }}">
        <input type="hidden" name="vid" value="{{ $video->id }}">
        <input type="submit" value="Delete">
    </form>
</li>