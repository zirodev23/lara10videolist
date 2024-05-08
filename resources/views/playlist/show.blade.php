<div>
    <h1>{{ $playlist->name }}</h1>
    <ul>
        @foreach($playlist->videos as $video)
            <li>{{ $video->title }}</li>
        @endforeach
    </ul>
    <a href="{{ route('playlist.index') }}">All playlists</a>
</div>
