@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin-email.css') }}">
@endsection

@section('content')
    <div class="notification__wrap">
        <div class="notification__header">
            お知らせメール
        </div>
        <div class="notification__content-wrap">
            <form action="/admin/send-email" method="post">
                @csrf
                <div class="notification__content">
                    <div class="notification__title vertical-center">宛先</div>
                    <input type="email" class="input-email" name="email" id="email" required>
                </div>
                <div class="notification__content-textarea">
                    <textarea class="notification__textarea" name="message" rows="10" required placeholder="本文"></textarea>
                </div>
                <div class="form__button">
                    <a href="/admin" class="back__button">戻る</a>
                    <button type="submit" class="form__button-btn">メール送信</button>
                </div>
            </form>
        </div>
    </div>
@endsection