@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="parent__container">
    @foreach ($items as $item)
        <div class="child__container-left">    
            @if (Str::startsWith($item['image'], 'images/'))
                <button><img class="product_image" src="{{ asset($item['image']) }}"></button>
            @else
                <button><img class="product_image" src="{{ asset( '/storage/' . $item['image']) }}"></button>
            @endif
        </div>
        <div class="child__container-right">
            <div class="name-group">
                <span class="label--item">商品名</span><br>
                <span class="form__label--item">{{ $item['name'] }}</span><br>
                <span class="form__label--item">¥{{ $item['price'] }}(値段)</span>
                @if (Auth::check())
                    <div class="icon-group">
                        <form action="/favorite" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <button class="favorite" type="submit" name="name" value="{{ $item['name'] }}">
                                <img class="favorite_image" src="{{ asset('images/star.jpg') }}">
                            </button>
                        </form>
                        <form action="/comment" method="get">
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <button class="comment" type="submit" name="name" value="{{ $item['name'] }}">
                                <img class="comment_image" src="{{ asset('images/comment.jpg') }}">
                            </button>
                        </form>
                    </div>
                    <form action="/purchase/{item_id}" method="get">
                        <div class="form__button">
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <button class="form__button-submit" type="submit">購入する</button>
                        </div>
                    </form>
                @else
                    <div class="icon-group">
                        <form action="/favorite" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <button class="favorite" type="submit" name="name" value="{{ $item['name'] }}">
                                <img class="favorite_image" src="{{ asset('images/star.jpg') }}">
                            </button>
                        </form>
                        <form action="/comment" method="get">
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <button class="comment" type="submit" name="name" value="{{ $item['name'] }}">
                                <img class="comment_image" src="{{ asset('images/comment.jpg') }}">
                            </button>
                        </form>
                    </div>
                    <form action="/login" method="get">
                        <div class="form__button">
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <button class="form__button-submit" type="submit">購入する</button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="description-group">
                <span class="label--item">商品説明</span><br><br>
                <span class="form__label--item">{{ $item['description'] }}</span><br>
            </div>
            <div class="infomation-group">
                <span class="label--item">商品説明</span><br><br>
                <div class="category-group">
                    <span class="form__label--item">カテゴリー</span>
                    <span class="item">{{ $item['category']['element']['name'] }}</span><br><br>
                </div>
                <div class="condition-group">
                    <span class="form__label--item">商品の状態</span>
                    <span class="item">{{ $item['condition']['condition'] }}</span>
                </div>
            </div>
        </div> 
    @endforeach
</div>
@endsection