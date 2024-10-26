@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="tabs">
        <button class="tab-button" data-target="tab1">おすすめ</button>
        @if (Auth::check())
            <button class="tab-button" data-target="tab2">マイリスト</button>
        @endif
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