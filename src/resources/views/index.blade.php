@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="tabs">
    <button class="tab-button" data-target="tab1">おすすめ</button>
    <button class="tab-button" data-target="tab2">マイリスト</button>
</div>
<div class="container">
    
</div>
@endsection