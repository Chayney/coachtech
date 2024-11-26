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
                    <img class="product_image" src="{{ asset($item['image']) }}">
                @else
                    <img class="product_image" src="{{ asset( '/storage/' . $item['image']) }}">
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
            <div class="user-address">
                @foreach ($profiles as $profile)
                    @if ($profile->pay == 1)
                        <span>クレジットカード</span>
                    @elseif ($profile->pay == 2)
                        <span>コンビニ</span>
                    @elseif ($profile->pay == 3)
                        <span>銀行振込</span>
                    @else
                        <span></span>
                    @endif
                @endforeach
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
                    <span class="form__label--item">¥{{ $item['price'] }}</span>
                </div>
                <div class="pay-group">
                    <span class="form__label--item">支払い方法</span><br>
                    @foreach ($profiles as $profile)
                        @if ($profile->pay == 1)
                            <span class="form__label--item">クレジットカード</span>
                        @elseif ($profile->pay == 2)
                            <span class="form__label--item">コンビニ</span>
                        @elseif ($profile->pay == 3)
                            <span class="form__label--item">銀行振込</span>
                        @else
                            <span></span>
                        @endif
                    @endforeach
                </div>
            </div>          
            <form action="/purchase" method="post">
                @csrf
                <div class="form__button">
                    <button class="form__button-submit" type="submit" name="id" value="{{ $item['id'] }}">購入する</button>
                </div>
            </form>    
        </div> 
    @endforeach
</div>
@endsection