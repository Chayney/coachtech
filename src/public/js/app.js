document.getElementById('searchButton').addEventListener('click', function() {
    var searchBar = document.getElementById('searchBar');
    if (searchBar.style.display === 'none' || searchBar.style.display === '') {
        searchBar.style.display = 'block';
    } else {
        searchBar.style.display = 'none';
    }
});

window.addEventListener('resize', function() {
    var searchBar = document.getElementById('searchBar');
    if (window.innerWidth >= 769) {
        searchBar.style.display = 'none';
    }
});


window.addEventListener('load', function() {
    var searchBar = document.getElementById('searchBar');
    if (window.innerWidth >= 769) {
        searchBar.style.display = 'none';
    }
});