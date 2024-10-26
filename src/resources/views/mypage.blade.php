@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="profile">
        @foreach ($profiles as $profile)
            <img class="profile_image" src="{{ $profile['image'] }}">
            <span class="label--item">{{ $profile['name'] }}</span>
            <form class="form-label--item" action="/mypage/profile" method="get">
                <button class="edit" type="submit" name="id" value="">プロフィールを編集</button>
            </form>
        @endforeach
    </div>
    <div class="tabs">
        <button class="tab-button" data-target="tab1">出品した商品</button>
        <button class="tab-button" data-target="tab2">購入した商品</button>
    </div>
    <div class="parent__container">
        @foreach ($products as $product)
            <div class="child__container">
                <form action="/item/" method="get">
                <img class="product_image" src="{{ $product['image'] }}">
            </div>
        @endforeach
    </div>
@endsection