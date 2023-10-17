@extends('header')
@section('content')
<header class="masthead d-flex align-items-center">
    <div class="container px-4 px-lg-5 text-center mt-5">
        <h1 class="mb-1">完了画面</h1>
        <h3 class="mb-5">ご報告いただいた内容は管理者が確認しまして投稿者へ連絡致します</h3>

        <a class="btn btn-primary btn-xl" href="{{ route('index') }}">トップページへ</a>
    </div>
</header>
@endsection