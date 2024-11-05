@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
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
            </div>
    @endforeach
    @foreach ($comments as $comment)
            <div class="profile">
                <div class="user-group">
                    <img class="profile_image" src="{{ '/storage/' . $comment['commentProfile']['image'] }}">
                    <span>{{ $comment['commentProfile']['name'] }}</span>
                </div>
                <div class="comment">
                    <span class="comment-text">{{ $comment['comment'] }}</span>
                </div>
            </div>
    @endforeach
            <div class="form-group">
                <span class="form__label--item">商品へのコメント</span>
                <form action="/comment/create" method="post">
                    <input type="text" class="comment-post" name="comment">
                </form>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">コメントを送信する</button>
            </div>
        </div>   
</div>
@endsection