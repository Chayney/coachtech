@extends('layouts.edit')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pay.css') }}">
@endsection

@section('content')
  <div class="pay__content">
    <div class="pay-form__heading">
      <h2>支払い方法の変更</h2>
    </div>
    <form class="form" action="/purchase/{item_id}" method="post">
      @csrf
      <div class="form__group">
        <div class="form__group-title">
          <label><input type="radio" name="pay" id="credit" value=1 {{ old('pay') == 1 || old('pay') == null ? : '' }}><span>クレジットカード</span></label>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <label><input type="radio" name="pay" id="store" value=2 {{ old('pay') == 2 || old('pay') == null ? : '' }}><span>コンビニ</span></label>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <label><input type="radio" name="pay" id="bank" value=3 {{ old('pay') == 3 || old('pay') == null ? : '' }}><span>銀行振込</span></label>
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