@extends('header')
@section('content')
<header class="masthead d-flex align-items-center">
    <div class="container px-4 px-lg-5 text-center mt-5">
        <h1 class="mb-1">完了画面</h1>
        <h3 class="mb-5">投稿された内容はトップページもしくはマイページからご確認ください</h3>

        <a class="btn btn-primary btn-xl" href="{{ route('mypage') }}">マイページへ</a>
        <a class="btn btn-primary btn-xl" href="{{ route('post_form') }}">新規投稿へ</a>
    </div>
</header>
@endsection