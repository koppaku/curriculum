@extends('layouts.auth')
@section('content')
<main>
    <div class="container w-25 mt-5 ">
        <div class="card border-dark mb-3">
            <div class="card-header">
            <h3>停止の確認</h3>
            </div>
        <div class="card-body">
            <p class="card-text">こちらのユーザーを停止させますか？</p>
            <p class="card-text">{{ $user_detail[0]['name'] }}</p>
            <p class="card-text">{{ $user_detail[0]['email'] }}</p>
        </div>
        </div>

        <div class="d-flex justify-content-around">

        <form action="{{ route('stop.user.comp', ['id' => $user_detail[0]['id']]) }}" method="post">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">停止</button>
            </div>
        </form>
        
        <div class="ml-3">
            <a href="{{ route('admin') }}" class="btn btn-primary">戻る</a>
        </div>

        </div>
    </div>
</main>
@endsection