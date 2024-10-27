@extends('layouts.edit')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell__content">
  <div class="sell-form__heading">
    <h2>商品の出品</h2>
  </div>
  <form class="form" action="/sell/register" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">商品画像</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--image">
          <img class="item_image">
          <label class="edit">画像を選択する<input type="file" class="file" name="image"></label>
        </div>
        <div class="form__error">
          @error('')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="group-title">
        <span class="label--item">商品の詳細</span>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">カテゴリー</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <select name="category_id">
            <option disabled selected>必須</option>
            @foreach ($categories as $category)
              <option value="{{ $category['id'] }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category['name'] }}</option>
            @endforeach
          </select>
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
          <input type="text" name="name" placeholder="必須 (40文字まで)">
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
          <input type="text" name="description">
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
          <input type="text" name="price" placeholder="¥">
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