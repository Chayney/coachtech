@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="profile">
        @foreach ($products as $product)
        <img class="profile_image" src="{{ $product['image'] }}">
    </div>
    <div class="tabs">
        <button class="tab-button" data-target="tab1">出品した商品</button>
        <button class="tab-button" data-target="tab2">購入した商品</button>
    </div>
    <div class="parent__container">
        
            <div class="child__container">
                <form action="/item/" method="get">
                <img class="product_image" src="{{ $product['image'] }}">
            </div>
        @endforeach
    </div>
@endsection