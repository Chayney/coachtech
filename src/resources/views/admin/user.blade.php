@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin-user.css') }}">
@endsection

@section('content')
  <!-- PC版レイアウト -->
  <div class="admin">
    <div class="admin__inner">
      <form class="search" action="/admin/user/search" method="get" onsubmit="return removeEmptyFields(this)">
        <input class="search-form__keyword-input" type="text" name="keyword" placeholder="ユーザー名やメールアドレスを入力してください">
        <div class="search-form__role">
          <select class="search-form__role-select" name="role">
            <option disabled selected>役割</option>
            @foreach ($roles as $role)
              <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="search-form__actions">
          <input class="search-form__search-btn" type="submit" value="検索">
        </div>
      </form>  
      <table class="admin__table">
        <tr class="admin__row">
          <th class="admin__label_id">番号</th>
          <th class="admin__label_name">ユーザー名</th>
          <th class="admin__label_email">メールアドレス</th>
          <th class="admin__label_role">役割</th>
          <th class="admin__label_detail">詳細</th>
        </tr>
        @foreach ($users as $user)   
          <tr class="admin__row">
            <td class="admin__label_id">{{ $user['id'] }}</td>
            <td class="admin__label_name">{{ $user['userProfile']['name'] }}</td>
            <td class="admin__label_email">{{ $user['email'] }}</td>
            @foreach ($user->roles as $role)
              <td class="admin__label_role">{{ $role['name'] }}</td>
            @endforeach
            <td class="admin__label_detail">
              <a class="admin__detail-btn" href="#pc-{{ $user['id'] }}">詳細</a>
            </td>
          </tr>
          <div class="modal" id="pc-{{ $user['id'] }}">
            <a href="#pc-{{ $user['id'] }}" class="modal-overlay"></a>
            <div class="modal__inner">
              <div class="modal__content">
                <form class="modal__detail-form" action="/admin/user/destroy" method="post">
                  @csrf
                  @method('DELETE')
                  <div class="modal-form__group">
                    <label class="modal-form__label">ユーザー名</label>
                    <p>{{ $user['userProfile']['name'] }}</p>
                  </div>
                  <div class="modal-form__group">
                    <label class="modal-form__label">郵便番号</label>
                    <p>{{ $user['userProfile']['postcode'] }}</p>
                  </div>
                  <div class="modal-form__group">
                    <label class="modal-form__label">住所</label>
                    <p>{{ $user['userProfile']['address'] }}</p>
                  </div>
                  <div class="modal-form__group">
                    <label class="modal-form__label">建物名</label>
                    <p>{{ $user['userProfile']['building'] }}</p>
                  </div>
                  <div class="modal-form__group">
                    <label class="modal-form__label">支払い方法</label>
                    @if ($user['userProfile']['pay'] == 1)
                      <p>クレジットカード</p>
                    @elseif ($user['userProfile']['pay'] == 2)
                      <p>コンビニ</p>
                    @elseif ($user['userProfile']['pay'] == 3)
                      <p>銀行振込</p>
                    @else
                      <p></p>
                    @endif
                  </div>
                  <input type="hidden" name="id" value="{{ $user['id'] }}">
                  <input class="modal-form__delete-btn btn" type="submit" value="削除" onclick="return showAlert('本当にユーザーを削除しますか？')">
                </form>
              </div>
              <a href="" class="modal__close-btn">✕</a>
            </div>
          </div>
        @endforeach
      </table>
    </div>

    <!-- スマホ版レイアウト -->
    <div class="parent__card">
      <form class="search-mobile" action="/admin/user/search" method="get">
        @csrf
        <input class="search-keyword-input-mobile" type="text" name="keyword" placeholder="ユーザー名やメールアドレスを入力してください">
        <div class="search-role-mobile">
          <select class="search-role-select-mobile" name="role">
            <option disabled selected>役割</option>
            @foreach ($roles as $role)
              <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="search-actions-mobile">
          <input class="search-search-btn-mobile" type="submit" value="検索">
        </div>
      </form>
      @foreach ($users as $user)
        <div class="card">
          <table class="user__table">
            <tr>
              <th class="table__header">番号</th>
              <td class="table__item">{{ $user['id'] }}</td>
              <td class="table__item">
                <a class="admin__detail-btn-mobile" href="#mobile-{{ $user['id'] }}">詳細</a>
              </td>
            </tr>
            <tr>
              <th class="table__header">ユーザー名</th>
              <td class="table__item">{{ $user['userProfile']['name'] }}</td>
            </tr>
            <tr>
              <th class="table__header">メールアドレス</th>
              <td class="table__item">{{ $user['email'] }}</td>
            </tr>
            <tr>
              <th class="table__header">役割</th>
              @foreach ($user->roles as $role)
                <td class="table__item">{{ $role['name'] }}</td>
              @endforeach
            </tr>
          </table>
        </div>
        <div class="modal-mobile" id="mobile-{{ $user['id'] }}">
          <a href="#mobile-{{ $user['id'] }}" class="modal-mobile-overlay"></a>
          <div class="modal-mobile__inner">
            <div class="modal-mobile__content">
              <form class="modal-mobile__detail-form" action="/admin/user/destroy" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-mobile-form__group">
                  <label class="modal-mobile-form__label">ユーザー名</label>
                  <p>{{ $user['userProfile']['name'] }}</p>
                </div>
                <div class="modal-mobile-form__group">
                  <label class="modal-mobile-form__label">郵便番号</label>
                  <p>{{ $user['userProfile']['postcode'] }}</p>
                </div>
                <div class="modal-mobile-form__group">
                  <label class="modal-mobile-form__label">住所</label>
                  <p>{{ $user['userProfile']['address'] }}</p>
                </div>
                <div class="modal-mobile-form__group">
                  <label class="modal-mobile-form__label">建物名</label>
                  <p>{{ $user['userProfile']['building'] }}</p>
                </div>
                <div class="modal-mobile-form__group">
                  <label class="modal-mobile-form__label">支払い方法</label>
                  @if ($user['userProfile']['pay'] == 1)
                    <p>クレジットカード</p>
                  @elseif ($user['userProfile']['pay'] == 2)
                    <p>コンビニ</p>
                  @elseif ($user['userProfile']['pay'] == 3)
                    <p>銀行振込</p>
                  @else
                    <p></p>
                  @endif
                </div>
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <input class="modal-mobile-form__delete-btn btn" type="submit" value="削除" onclick="return showAlert('本当にユーザーを削除しますか？')">
              </form>
            </div>
            <a href="" class="modal-mobile__close-btn">✕</a>
          </div>
        </div>
      @endforeach
    </div>
    {{ $users->appends(request()->query())->links('pagination::custom') }}
  </div>
  <script>
    function removeEmptyFields(form) {
      Array.from(form.elements).forEach(input => {
        if (!input.value) {
          input.name = '';
        }
      });
      return true;
    }
    function showAlert(message) {
      return confirm(message);
    }
  </script>
@endsection