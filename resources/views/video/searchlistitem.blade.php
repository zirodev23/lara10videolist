@foreach ($videos as $video)
    <div class="mp3-container">
        <div class="mp3-info">{{ $video->title }}</div>
        <form action="/addtoplaylist" method="post">
            @csrf
            <input type="hidden" name="pid" value="{{ $playlist->id }}">
            <input type="hidden" name="vid" value="{{ $video->id }}">
            <input type="submit" value="Add">
        </form>
    </div>
@endforeach
