@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="parent__container">
    @foreach ($products as $product)
        <div class="child__container-left">    
            <img class="product_image" src="{{ $product['image'] }}">
        </div>
        <div class="child__container-right">
            <div class="name-group">
                <span class="label--item">商品名</span><br>
                <span class="form__label--item">{{ $product['name'] }}</span><br>
                <span class="form__label--item">¥{{ $product['price'] }}(値段)</span>
                <form action="" method="post">
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">購入する</button>
                    </div>
                </form>
            </div>
            <div class="description-group">
                <span class="label--item">商品説明</span><br><br>
                <span class="form__label--item">{{ $product['description'] }}</span><br>
            </div>
            <div class="infomation-group">
                <span class="label--item">商品説明</span><br><br>
                <span class="form__label--item">カテゴリー</span>
                <span class="item">{{ $product['category']['item']['name'] }}</span><br><br>
                <span class="form__label--item">商品の状態</span>
                <span class="item">{{ $product['condition']['condition'] }}</span>
            </div>
        </div> 
    @endforeach
</div>
@endsection