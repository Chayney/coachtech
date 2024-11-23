@extends('layouts.edit')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
  <div class="thanks__content">
    <div class="thanks-form__heading">
      <h2>ご購入ありがとうございました。</h2>
    </div>
    <div class="home__link">
      <a class="button-submit" href="/">戻る</a>
    </div>
  </div>
@endsection