document.getElementById('searchButton').addEventListener('click', function() {
    var searchBar = document.getElementById('searchBar');
    if (searchBar.style.display === 'none' || searchBar.style.display === '') {
        searchBar.style.display = 'block'; // 検索バーを表示
    } else {
        searchBar.style.display = 'none'; // 検索バーを非表示
    }
});
