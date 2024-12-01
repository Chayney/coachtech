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
                <form id="purchase-form" action="/purchase" method="post">
                    @csrf
                    <div class="form__button">
                        <button class="form__button-submit" type="submit" name="id" id="purchase-button" value="{{ $item['id'] }}">購入する</button>
                    </div>
                </form>
            </div> 
        @endforeach
    </div>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        var profiles = @json($profiles);
        var items = @json($items);
        var profile = profiles.length > 0 ? profiles[0] : null;
        var item = items.length > 0 ? items[0] : null;
        var paymentAmount = item.price;
        if (profile && profile.pay === 1 && profile.address) {
            var stripePublicKey = "{{ config('services.stripe.key') }}";
            document.getElementById('purchase-button').addEventListener('click', function(e) {
                e.preventDefault();
                var handler = StripeCheckout.configure({
                    key: stripePublicKey,
                    locale: 'auto',
                    token: function(token) {
                        var form = document.createElement('form');
                        var tokenInput = document.createElement('input');
                        tokenInput.type = 'hidden';
                        tokenInput.name = 'stripeToken';
                        tokenInput.value = token.id;
                        form.appendChild(tokenInput);
                        var hiddenInputCsrf = document.createElement('input');
                        hiddenInputCsrf.type = 'hidden';
                        hiddenInputCsrf.name = '_token';
                        hiddenInputCsrf.value = '{{ csrf_token() }}';
                        form.appendChild(hiddenInputCsrf);
                        var itemInput = document.createElement('input');
                        itemInput.type = 'hidden';
                        itemInput.name = 'item_id';
                        itemInput.value = item.id;
                        form.appendChild(itemInput);
                        var amountInput = document.createElement('input');
                        amountInput.type = 'hidden';
                        amountInput.name = 'amount';
                        amountInput.value = paymentAmount;
                        form.appendChild(amountInput);
                        form.method = 'POST';
                        form.action = '/purchase';
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
                handler.open({
                    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                    name: 'デモ決済',
                    description: 'これはデモ決済です',
                    amount: paymentAmount,
                    currency: 'jpy',
                });
            });
            window.addEventListener('popstate', function() {
                handler.close();
            });
        } else {
            document.getElementById('purchase-form').addEventListener('submit', function(e) {
                console.log("決済画面は表示されません。購入処理を行います。");
            });
        }    
    </script>
@endsection