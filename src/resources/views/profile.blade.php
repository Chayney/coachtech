@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
  <div class="profile__content">
    <div class="profile-form__heading">
      <h2>プロフィール設定</h2>
    </div>
    @if (!$profiles->isEmpty())
      @foreach ($profiles as $profile)      
        <form class="form" action="/profile/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="profile">
              <img class="profile_image" src="{{ '/storage/' . $profile['image'] }}">
              <label class="edit">画像を選択する<input type="file" class="file" name="image"></label>
            </div>
          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label--item">ユーザー名</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="name" value="{{ $profile['name'] }}" />
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
              <span class="form__label--item">郵便番号</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="postcode" value="{{ $profile['postcode'] }}" />
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
                <input type="text" name="address" value="{{ $profile['address'] }}" />
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
                <input type="text" name="building" value="{{ $profile['building'] }}" />
              </div>
              <div class="form__error">
                @error('')
                {{ $message }}
                @enderror
              </div>
            </div>
          </div>
          <div class="form__button">
            <button class="form__button-submit" type="submit">更新する</button>
          </div>
        </form>
      @endforeach
    @else
      <form class="form" action="/profile/update" method="post" enctype="multipart/form-data">
          @csrf
          <div class="profile">
            <img class="profile_image">
            <label class="edit">画像を選択する<input type="file" class="file" name="image"></label>
          </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">ユーザー名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name">
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
          <button class="form__button-submit" type="submit">更新する</button>
        </div>
      </form>
    @endif
  </div>
@endsection