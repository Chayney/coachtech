<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>coachtech</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
          <img src="{{ asset('images/logo.svg') }}">
        </a>
        <input class="search__box" type="text" name="keyword" placeholder="なにをお探しですか?" value="">
        <nav>
          <ul class="header-nav">
          @if (Request::is('register'))
            <li class="header-nav__item">
              <form action="logout" method="post">
                <button class="header-nav__button">ログアウト</button>
              </form>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/mypage">マイページ</a>
            </li>
          @else
          </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/login">ログイン</a>
            </li>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/register">会員登録</a>
            </li>
          @endif
          @if (Auth::check())
            <li class="header-nav__white">
              <a class="header-item__link" href="/">出品</a>
            </li>
          @else
            <li class="header-nav__white">
              <a class="header-item__link" href="/login">出品</a>
            </li>
          @endif
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>