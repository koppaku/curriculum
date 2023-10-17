@extends('header')
@section('content')
<header class="masthead d-flex align-items-center">
    <h1>
    パスワードリセット
    </h1>
    <p>
    以下のボタンを押下し、パスワードリセットの手続きを行ってください。
    </p>
    <p id="button">
    <a href="{{$reset_url}}">パスワードリセット</a>
    </p>
</header>
@endsection