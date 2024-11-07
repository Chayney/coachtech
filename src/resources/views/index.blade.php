@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="tabs">
        @if (Auth::check())
            <button class="tab-button active" data-target="tab1">おすすめ</button>
            <button class="tab-button" data-target="tab2">マイリスト</button>
        @else
            <button class="tab-button-stable" data-target="tab3">おすすめ</button>
        @endif
    </div>
    <div class="tab-content">
        @if (Auth::check())
            <div id="tab1" class="tab-pane">
                <div class="parent__container">
                    @foreach ($items as $item)
                        <div class="child__container">
                            <form action="/item/{item_id}" method="get">
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    @if (Str::startsWith($item['image'], 'images/'))
                                        <button><img class="product_image" src="{{ asset($item['image']) }}"></button>
                                    @else
                                        <button><img class="product_image" src="{{ asset( '/storage/' . $item['image']) }}"></button>
                                    @endif
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="tab2" class="tab-pane">
            <div class="parent__container-right">
                @foreach ($favoriteItems as $favoriteItem)
                    <div class="child__container">
                        <form action="/item/{item_id}" method="get">
                            <input type="hidden" name="id" value="{{ $favoriteItem['id'] }}">
                                @if (Str::startsWith($item['image'], 'images/'))
                                    <button><img class="product_image" src="{{ asset($favoriteItem['image']) }}"></button>
                                @else
                                    <button><img class="product_image" src="{{ asset( '/storage/' . $favoriteItem['image']) }}"></button>
                                @endif
                        </form>
                    </div>
                @endforeach
            </div>  
            </div>
        @else
            <div id="tab3">
                <div class="parent__container">
                    @foreach ($items as $item)
                        <div class="child__container">
                            <form action="/item/{item_id}" method="get">
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    @if (Str::startsWith($item['image'], 'images/'))
                                        <button><img class="product_image" src="{{ asset($item['image']) }}"></button>
                                    @else
                                        <button><img class="product_image" src="{{ asset( '/storage/' . $item['image']) }}"></button>
                                    @endif
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <script src="{{ asset('js/index.js') }}" type="text/javascript"></script>
@endsection