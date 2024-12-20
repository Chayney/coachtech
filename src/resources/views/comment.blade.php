@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
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
                </div>
                @if (Auth::check())
                    <div class="icon-group">
                        @if ($item->favoriteMarked())
                            <form action="/favorite/destroy" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                                <button class="favorited" type="submit" onclick="return showAlert('本当にお気に入りを削除しますか？')">
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
                @foreach ($comments as $comment)
                    <div class="profile">
                        <div class="user-group">
                            @if (empty($comment['commentProfile']['name']))
                                <img class="profile_image" src="{{ asset($comment['commentProfile']['image']) }}">
                                <span class="profile_name">ユーザー名</span>
                            @elseif (Str::startsWith($comment['commentProfile']['image'], 'images/'))
                                <img class="profile_image" src="{{ asset($comment['commentProfile']['image']) }}">
                                <span class="profile_name">{{ $comment['commentProfile']['name'] }}</span>
                            @else
                                <img class="profile_image" src="{{ asset( '/storage/' . $comment['commentProfile']['image']) }}">
                                <span class="profile_name">{{ $comment['commentProfile']['name'] }}</span>
                            @endif                                   
                        </div>
                        <div class="comment-area">
                            <span class="comment-text">{{ $comment['comment'] }}</span>
                        </div>
                    </div>
                @endforeach
                @if (Auth::check())
                    <form action="/comment/create" method="post">
                        @csrf
                        <div class="form-group">
                            <span class="form__label--item">商品へのコメント</span>
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">            
                            <textarea class="comment-post" name="comment"></textarea>          
                        </div>
                        <div class="form__button">
                            <button class="form__button-submit" type="submit">コメントを送信する</button>
                        </div>
                    </form>
                @else
                    <div class="form-group">
                        <span class="form__label--item">商品へのコメント</span>           
                        <textarea class="comment-post" name="comment"></textarea>             
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" onclick="location.href='/login'">コメントを送信する</button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <script>
        function showAlert(message) {
            return confirm(message);
        }
    </script>
@endsection