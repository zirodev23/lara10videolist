document.addEventListener('DOMContentLoaded', function () {

    console.log("search video loaded");

    const form = document.getElementById('search_form');
    const songList = document.querySelector('#song_list');
    
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        let term = event.target.querySelector('input').value;

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    songList.innerHTML = xhr.responseText;

                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };
        xhr.open('GET', `/search?term=${term}`, true);
        xhr.send();
    });
});