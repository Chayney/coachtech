@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin-comment.css') }}">
@endsection

@section('content')
  <!-- PC版レイアウト -->
  <div class="admin">
    <div class="admin__inner">
      <form class="search" action="/admin/comment/search" method="get" onsubmit="return removeEmptyFields(this)">
        <input class="search-form__keyword-input" type="text" name="freeword" placeholder="ユーザー名もしくはコメントを入力してください">
        <div class="search-form__actions">
          <input class="search-form__search-btn" type="submit" value="検索">
        </div>
      </form>  
      <table class="admin__table">
        <tr class="admin__row">
          <th class="admin__label_id">番号</th>
          <th class="admin__label_name">ユーザー名</th>
          <th class="admin__label_comment">コメント</th>
          <th class="admin__label_delete">削除</th>
        </tr>
        @foreach ($comments as $comment)   
          <tr class="admin__row">
            <td class="admin__label_id">{{ $comment['id'] }}</td>
            <td class="admin__label_name">{{ $comment['commentProfile']['name'] }}</td>
            <td class="admin__label_comment">{{ $comment['comment'] }}</td>
            <td class="admin__label_delete">
              <form action="/admin/comment/delete"  class="trash-group" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $comment['id'] }}">
                <button class="trash" type="submit" onclick="return showAlert('本当にコメントを削除しますか？')">
                    <img class="trash_image" src="{{ asset('images/trash.jpg') }}">
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>

    <!-- スマホ版レイアウト -->
    <div class="parent__card">
      <form class="search-mobile" action="/admin/comment/search" method="get">
        @csrf
        <input class="search-keyword-input-mobile" type="text" name="freeword" placeholder="ユーザー名もしくはコメントを入力してください">
        <div class="search-actions-mobile">
          <input class="search-search-btn-mobile" type="submit" value="検索">
        </div>
      </form>
      @foreach ($comments as $comment)
        <div class="card">
          <table class="user__table">
            <tr>
              <th class="table__header">番号</th>
              <td class="table__item">{{ $comment['id'] }}</td>
              <td class="table__item_delete">
                <form action="/admin/comment/delete" class="trash-group" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{ $comment['id'] }}">
                  <button class="trash" type="submit" onclick="return showAlert('本当にコメントを削除しますか？')">
                      <img class="trash_image" src="{{ asset('images/trash.jpg') }}">
                  </button>
                </form>
              </td>
            </tr>
            <tr>
              <th class="table__header">ユーザー名</th>
              <td class="table__item">{{ $comment['commentProfile']['name'] }}</td>
            </tr>
            <tr>
              <th class="table__header">コメント</th>
              <td class="table__item">{{ $comment['comment'] }}</td>
            </tr>
          </table>
        </div>
      @endforeach
    </div>
    {{ $comments->appends(request()->query())->links('pagination::custom') }}
  </div>
  <script>
    function showAlert(message) {
      return confirm(message);
    }
    function removeEmptyFields(form) {
        Array.from(form.elements).forEach(input => {
            if (!input.value) {
                input.name = '';
            }
        });
        return true;
    }
  </script>
@endsection