@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="profile">
        @if (!$profiles->isEmpty())
            @foreach ($profiles as $profile)
                <img class="profile_image" src="{{ '/storage/' . $profile['image'] }}">
                <span class="label--item">{{ $profile['name'] }}</span>
                <form class="form-label--item" action="/mypage/profile" method="get">
                    <input type="hidden" name="profile_id" value="{{ $profile['id'] }}">
                    <button class="edit" type="submit">プロフィールを編集</button>
                </form>
            @endforeach
        @else
            <img class="profile_image">
            <span class="label--item">ユーザー名</span>
            <form class="form-label--item" action="/mypage/profile" method="get">
                <button class="edit" type="submit">プロフィールを編集</button>
            </form>
        @endif
    </div>
    
      <div class="tabs">
        <button class="tab-button active" data-target="tab1">出品した商品</button>
        <button class="tab-button" data-target="tab2">購入した商品</button>
      </div>
      <div class="tab-content">
        <div id="tab1" class="tab-pane">
            <div class="parent__container-left">
                @foreach ($items as $item)
                    <div class="child__container-left">  
                        <form action="/comment/edit" method="get"> 
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">      
                                @if (Str::startsWith($item['image'], 'images/'))
                                    <button type="submit" name="name" value="{{ $item['name'] }}"><img class="product_image" src="{{ asset($item['image']) }}"></button>
                                @else
                                    <button type="submit" name="name" value="{{ $item['name'] }}"><img class="product_image" src="{{ asset( '/storage/' . $item['image']) }}"></button>
                                @endif
                        </form>              
                    </div>
                @endforeach
            </div>
        </div>
        <div id="tab2" class="tab-pane">
          <div class="parent__container-right">
          </div>  
        </div>
      </div>
      
    <script src="{{ asset('js/mypage.js') }}" type="text/javascript"></script>
@endsection