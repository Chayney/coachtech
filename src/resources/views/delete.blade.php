@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
@endsection

@section('content')
    <div class="parent__container">
        @foreach ($items as $item)
            <div class="child__container-left">    
                @if (Str::startsWith($item['image'], 'images/'))
                    <img class="product_image" src="{{ asset($item['image']) }}">
                @else
                    <img class="product_image" src="{{ asset( '/storage/' . $item['image']) }}">
                @endif
            </div>
            <div class="child__container-right">
                <div class="name-group">
                    <span class="label--item">商品名</span><br>
                    <span class="form__label--item">{{ $item['name'] }}</span><br>
                    <span class="form__label--item">¥{{ $item['price'] }}(値段)</span>
                    @if (Auth::check())
                        <div class="icon-group">
                            @if ($item->favoriteMarked())
                                <form action="/favorite/destroy{item}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                                    <button class="favorited" type="submit">
                                        <img class="favorited_image" src="{{ asset('images/yellow_star.jpg') }}">
                                        <span>{{ $item->favorites_count }}</span>
                                    </button>                      
                                </form>
                            @else
                                <form action="/favorite/store" method="post">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                                    <button class="favorite" type="submit">
                                        <img class="favorite_image" src="{{ asset('images/star.jpg') }}">
                                        <span>{{ $item->favorites_count }}</span>
                                    </button>                            
                                </form>
                            @endif
                            <div class="comment-group">
                                <button class="comment">
                                    <img class="comment_image" src="{{ asset('images/comment.jpg') }}">
                                    <span>{{ $item->comments_count }}</span>
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="icon-group">
                            <div class="favorite-group">
                                <button class="favorite" onclick="location.href='/login'">
                                    <img class="favorite_image" src="{{ asset('images/star.jpg') }}">
                                    <span>{{ $item->favorites_count }}</span>
                                </button>
                            </div>
                            <div class="comment-group">
                                <button class="comment" >
                                    <img class="comment_image" src="{{ asset('images/comment.jpg') }}">
                                    <span>{{ $item->comments_count }}</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                @foreach ($comments as $comment)
                    <div class="profile">
                        <div class="user-group">
                            @if (empty($comment['commentProfile']['name']))
                                <img class="profile_image" src="{{ asset($comment['commentProfile']['image']) }}">
                                <span class="user_name">ユーザー名</span>
                            @elseif (Str::startsWith($comment['commentProfile']['image'], 'images/'))
                                <img class="profile_image" src="{{ asset($comment['commentProfile']['image']) }}">
                                <span class="user_name">{{ $comment['commentProfile']['name'] }}</span>
                            @else
                                <img class="profile_image" src="{{ asset( '/storage/' . $comment['commentProfile']['image']) }}">
                                <span class="user_name">{{ $comment['commentProfile']['name'] }}</span>
                            @endif               
                            <form action="/comment/destroy"  class="trash-group" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $comment['id'] }}">
                                <button class="trash" type="submit" onclick="return showAlert('本当にコメントを削除しますか？')">
                                    <img class="trash_image" src="{{ asset('images/trash.jpg') }}">
                                </button>
                            </form>
                        </div>
                        <div class="comment-area">
                            <span class="comment-text">{{ $comment['comment'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <script src="{{ asset('js/delete.js') }}" type="text/javascript"></script>
@endsection