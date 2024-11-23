<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>coachtech</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner-mobile">
      <div class="nav-humberger">
        <input id="drawer_input" class="drawer_hidden" type="checkbox">
        <label for="drawer_input" class="drawer_open"><span></span></label>
        <nav class="nav_content">
            <ul class="nav_list">
              <li class="nav_item">
                <form action="/logout" method="post">
                  @csrf
                  <button class="logout">ログアウト</button>
                </form>
              </li>
            </ul>
        </nav>
      </div>
      <a class="header__logo-mobile" href="/">
        <img class="logo-mobile" src="{{ asset('images/logo.svg') }}">
      </a>
      <button id="searchButton">
        <img class="search__logo" src="{{ asset('images/search.jpg') }}">
      </button>
      <div id="searchBar" class="search-bar">
        <form action="/search" class="search-word-hover" method="get">
          <input class="search__box" type="text" name="keyword" placeholder="なにをお探しですか?" value="{{ request('keyword') }}">
        </form>
      </div>
    </div>
    <form action="/search" class="search-word-mobile" method="get">
      <input class="search__box" type="text" name="keyword" placeholder="なにをお探しですか?" value="{{ request('keyword') }}">
    </form>
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
          <img src="{{ asset('images/logo.svg') }}">
        </a>
        <form action="/search" class="search-word" method="get">
          <input class="search__box" type="text" name="keyword" placeholder="なにをお探しですか?" value="{{ request('keyword') }}">
        </form>
        <nav>
          <ul class="header-nav">
            <li class="header-nav__item">
              <form class="header-nav__link" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
              </form>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>