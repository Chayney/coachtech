@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
                        <form action="/comment" method="get">
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <button class="comment" type="submit" name="name" value="{{ $item['name'] }}">
                                <img class="comment_image" src="{{ asset('images/comment.jpg') }}">
                                <span>{{ $item->comments_count }}</span>
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
                        <div class="favorite-group">
                            <button class="favorite" onclick="location.href='/login'">
                                <img class="favorite_image" src="{{ asset('images/star.jpg') }}">
                                <span>{{ $item->favorites_count }}</span>
                            </button>
                        </div>
                        <form action="/comment" method="get">
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <button class="comment" type="submit" name="name" value="{{ $item['name'] }}">
                                <img class="comment_image" src="{{ asset('images/comment.jpg') }}">
                                <span>{{ $item->comments_count }}</span>
                            </button>
                        </form>
                    </div>
                    <div class="form__button" onclick="location.href='/login'">
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <button class="form__button-submit" type="submit">購入する</button>
                    </div>
                @endif
                <div class="description-group">
                    <span class="label--item">商品説明</span><br><br>
                    <span class="form__label--item">{{ $item['description'] }}</span><br>
                </div>
                <div class="infomation-group">
                    <span class="label--item">商品説明</span><br><br>
                    <div class="category-group">
                        <div class="category-left">
                            <span class="form__label--item">カテゴリー</span>
                        </div>
                        <div class="category-right">
                            @foreach ($item->elements as $element)
                                <span class="item">{{ $element['name'] }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="condition-group">
                        <div class="condition-left">
                            <span class="form__label--item">商品の状態</span>
                        </div>
                        <div class="condition-right">
                            <span class="condition-item">{{ $item['condition']['condition'] }}</span>
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
    <script>
        function showAlert(message) {
            return confirm(message);
        }
    </script>
@endsection