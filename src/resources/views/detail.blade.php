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
        <div class="group-title">
            <span class="label--item">商品名</span><br>
            <span class="form__label--item">{{ $product['name'] }}</span><br>
            <span class="form__label--item">¥{{ $product['price'] }}(値段)</span>
            <form action="" method="post">
                <div class="form__button">
                    <button class="form__button-submit" type="submit">購入する</button>
                </div>
            </form>
        </div>
    </div> 
    @endforeach
</div>
@endsection