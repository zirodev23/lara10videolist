<div>
    <div>
        <h1>{{ $playlist->name }}</h1>
        <ul class="playlist">
            @foreach($playlist->videos as $video)
               @include('video.showlistitem')
            @endforeach
        </ul>

        <form id="search_form">
            <input type="text" placeholder="Search ...">
            <input type="hidden" name="pid" value="{{ $playlist->id }}">
            <button type="submit">Search</button>
        </form>
        <div id="search-video-list"></div>
    </div>
    <div>
        <a href="{{ route('playlist.index') }}">All playlists</a>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.getElementById('search_form');
        const searchVideoList = document.querySelector('#search-video-list');

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();

            let term = event.target.querySelector('input').value;
            let pid = event.target.querySelector('input[name="pid"]').value;

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        searchVideoList.innerHTML = xhr.responseText;
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.open('GET', `/videosearch?term=${term}&pid=${pid}`, true);
            xhr.send();
        });

        const playlistUl = document.querySelector('ul.playlist');

        searchVideoList.addEventListener('click', function(event) {
            event.preventDefault();
            const target = event.target;

            if (event.target.matches('input')) {
                const xhr = new XMLHttpRequest();
                const params = new FormData(target.parentElement);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const item = document.createElement('li');
                            item.innerHTML = xhr.responseText;
                            playlistUl.appendChild(item);

                            resetSearch();
                        } else {
                            console.error('Error:', xhr.status);
                        }
                    }
                };
                xhr.open('POST', '/addtoplaylist', true);
                xhr.send(params);
            }
        });

        playlistUl.addEventListener('click', function (){
            event.preventDefault();
            const target = event.target;

            if (event.target.matches('input')) {
                const xhr = new XMLHttpRequest();
                const form = target.parentElement;
                const params = new FormData(form);
                const li = form.parentElement;

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            li.remove();
                        } else {
                            console.error('Error:', xhr.status);
                        }
                    }
                };
                xhr.open('POST', '/removefromplaylist', true);
                xhr.send(params);
            }
        });

        function resetSearch() {
            searchVideoList.replaceChildren();
            searchForm.firstElementChild.value = "";
        }
    });
</script>