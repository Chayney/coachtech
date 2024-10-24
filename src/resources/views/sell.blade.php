@extends('layouts.edit')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell__content">
  <div class="sell-form__heading">
    <h2>商品の出品</h2>
  </div>
  <form class="form" action="/" method="post">
    <div class="group-title">
        <span class="label--item">商品の詳細</span>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">カテゴリー</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="" value="" />
        </div>
        <div class="form__error">
          @error('')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">商品の状態</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="password" name="password" />
        </div>
        <div class="form__error">
          @error('')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="group-title">
        <span class="label--item">商品名と説明</span>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">商品名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="" placeholder="必須 (40文字まで)" />
        </div>
        <div class="form__error">
          @error('')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">商品の説明</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <input type="text" name="" />
        </div>
        <div class="form__error">
          @error('')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="group-title">
        <span class="label--item">販売価格</span>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">販売価格</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="" placeholder="¥"/>
        </div>
        <div class="form__error">
          @error('')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">出品する</button>
    </div>
  </form>
</div>
@endsection