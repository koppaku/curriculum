@extends('header')
@section('content')
<main>
    <div class="container w-25 mt-5 ">
        <div class="card border-dark mb-3">
            <div class="card-header">
            <h3>退会の確認</h3>
            </div>
        <div class="card-body">
            <p class="card-text">退会をすると投稿も全て削除されます。</p>
            <p class="card-text">それでも退会をしますか？</p>
        </div>
        </div>

        <div class="d-flex justify-content-around">

        <form action="{{ route('delete.user.comp') }}" method="post">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">退会</button>
            </div>
        </form>
        
        <div class="ml-3">
            <a href="{{ route('mypage') }}" class="btn btn-primary">戻る</a>
        </div>

        </div>
    </div>
</main>
@endsection