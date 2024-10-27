@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="profile">
        @if (!$profiles->isEmpty())
            @foreach ($profiles as $profile)
                <img class="profile_image" src="{{ '/storage/' . $profile['image'] }}">
                <span class="label--item">{{ $profile['name'] }}</span>
                <form class="form-label--item" action="/mypage/profile" method="get">
                    <input type="hidden" name="profile_id" value="{{ $profile['id'] }}">
                    <button class="edit" type="submit">プロフィールを編集</button>
                </form>
            @endforeach
        @else
            <img class="profile_image">
            <span class="label--item">ユーザー名</span>
            <form class="form-label--item" action="/mypage/profile" method="get">
                <button class="edit" type="submit">プロフィールを編集</button>
            </form>
        @endif
    </div>
    <div class="tabs">
        <button class="tab-button" data-target="tab1">出品した商品</button>
        <button class="tab-button" data-target="tab2">購入した商品</button>
    </div>
    <div class="parent__container">
        @foreach ($items as $item)
            <div class="child__container">
                <img class="product_image" src="{{ '/storage/' . $item['image'] }}">         
            </div>
        @endforeach
    </div>
@endsection