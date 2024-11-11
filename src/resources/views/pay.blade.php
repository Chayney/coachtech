@extends('layouts.edit')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pay.css') }}">
@endsection

@section('content')
  <div class="address__content">
    <div class="address-form__heading">
      <h2>支払い方法の変更</h2>
    </div>
    <div class="form__error">
      @error('pay')
      {{ $message }}
      @enderror
    </div>
    <form class="form" action="/purchase/{item_id}" method="post">
      @csrf
      @method('PATCH')
      <div class="form__group">
        <div class="form__group-title">
        <label><input type="radio" name="pay" value="クレジットカード"><span>クレジットカード</span></label>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="postcode">
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
        <label><input type="radio" name="pay" value="コンビニ"><span>コンビニ</span></label>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
        <label><input type="radio" name="pay" value="銀行振込"><span>銀行振込</span></label>
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