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
        @foreach ($items as $item)
            <div class="child__container">
                <form action="/item/:item_id" method="get">
                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                    <button><img class="product_image" src="{{ '/storage/' . $item['image'] }}"></button>
                </form>
            </div>
        @endforeach
    </div>
@endsection