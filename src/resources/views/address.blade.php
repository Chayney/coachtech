@extends('layouts.edit')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="address__content">
  <div class="address-form__heading">
    <h2>住所の変更</h2>
  </div>
  <form class="form" action="/purchase/:item_id" method="post">
    @csrf
    @method('PATCH')
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">郵便番号</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="postcode">
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address">
        </div>
        <div class="form__error">
          @error('password')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building">
        </div>
        <div class="form__error">
          @error('')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      @foreach ($items as $item)
        <button class="form__button-submit" type="submit" name="id" value="{{ $item['id'] }}">更新する</button>
      @endforeach
    </div>
  </form>
</div>
@endsection