<div>
    <h1>Videos</h1>
    <ul>
        @foreach($videos as $video)
            <li>
                {{ $video->title }}
            </li>
        @endforeach
    </ul>
    @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
    @endauth
</div>
<div>
    Video upload to be implemented...
</div>
