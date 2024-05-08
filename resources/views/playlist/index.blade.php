<div>
    <h1>Playlists</h1>
    <ul>
        @foreach($playlists as $playlist)
            <li>
                <a href="{{ route('playlist.show', $playlist) }}">{{ $playlist->name }}</a>
            </li>
        @endforeach
    </ul>
    @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
    @endauth
</div>
