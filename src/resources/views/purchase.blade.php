@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="parent__container">
    @foreach ($items as $item)
        <div class="child__container-left">    
            <img class="product_image" src="{{ '/storage/' . $item['image'] }}">
        </div>
        <div class="child__container-right">
            <div class="name-group">
                <span class="label--item">商品名</span><br>
                <span class="form__label--item">{{ $item['name'] }}</span><br>
                <span class="form__label--item">¥{{ $item['price'] }}(値段)</span>
                <form action="/purchase" method="post">
                    @csrf
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">購入する</button>
                    </div>
                </form>
            </div>
        </div> 
    @endforeach
</div>
@endsection