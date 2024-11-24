@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin-index.css') }}">
@endsection

@section('content')
  <div class="admin__content">
    <div class="admin-form__heading">
      <h1>管理者専用ページ</h1>
    </div>
    <div class="link">
      <a class="button-submit" href="/admin/user">ユーザー一覧</a>
    </div>
    <div class="link">
      <a class="button-submit" href="/admin/comment">コメント一覧</a>
    </div>
    <div class="link">
      <a class="button-submit" href="/user">お知らせメール作成・送信</a>
    </div>
  </div>
@endsection