@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="parent__container">
    @foreach ($items as $item)
        <div class="child__container-left">
            <div class="item-group">
                @if (Str::startsWith($item['image'], 'images/'))
                    <button><img class="product_image" src="{{ asset($item['image']) }}"></button>
                @else
                    <button><img class="product_image" src="{{ asset( '/storage/' . $item['image']) }}"></button>
                @endif
                <div class="name-group">
                    <span class="form__label--item">{{ $item['name'] }}</span><br>
                    <span class="form__label--item">¥{{ $item['price'] }}(値段)</span>
                </div>
            </div>
            <div class="pay-group">
                <span class="form__label--item">支払い方法</span><br>
                <form action="/purchase/pay/{item_id}" method="get">
                    <button class="pay-link"  name="id" value="{{ $item['id'] }}">変更する</button>
                </form>
            </div>
            <div class="address-group">
                <span class="form__label--item">配送先</span><br>
                <form action="/purchase/address/{item_id}" method="get">
                    <button class="address-link"  name="id" value="{{ $item['id'] }}">変更する</button>
                </form>
            </div>
            <div class="user-address">
                @foreach ($profiles as $profile)
                    <span>〒{{ $profile['postcode'] }}</span><br><br>
                    <span>{{ $profile['address'] }}{{ $profile['building'] }}</span><br><br>
                @endforeach
            </div>
        </div>
        <div class="child__container-right">
            <div class="grand-child__container">
                <div class="price-group">
                    <span class="form__label--item">商品代金</span><br>
                    <span class="form__label--item">¥{{ $item['price'] }}(値段)</span>
                </div>
                <div class="pay-group">
                    <span class="form__label--item">支払い金額</span><br>
                    <span class="form__label--item">¥500</span>
                </div>
                <div class="pay-group">
                    <span class="form__label--item">支払い方法</span><br>
                    <span class="form__label--item">コンビニ払い</span>
                </div>
            </div>          
            <form action="/purchase" method="post">
                @csrf
                <div class="form__button">
                    <button class="form__button-submit" type="submit">購入する</button>
                </div>
            </form>    
        </div> 
    @endforeach
</div>
@endsection