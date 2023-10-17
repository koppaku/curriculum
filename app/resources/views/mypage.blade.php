@extends('header')
@section('content')

<header class="py-5">
    <div class="d-flex justify-content-around  align-items-center px-5 pb-5">
        <div class="row gx-5 align-items-center">
            <div class="col-xxl-5">
                <!-- Header text content-->
                <div class="text-center text-xxl-start">
                    <h1 class="display-5 fw-bolder mb-5">{{ Auth::user()->name }}</h1>
                    <h2 class="display-6 fw-bolder mb-5">{{ Auth::user()->email }}</h2>
                    <div class="d-grid gap-3 d-flex justify-content-around mb-3">
                        <div><a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="{{ route('profile') }}">情報編集</a></div>
                        <div><a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ route('delete.user.conf') }}">退会</a></div>
                        <div><a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="{{ route('post_form') }}">新規投稿</a></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7">
                <!-- Header profile picture-->
                <div class="">
                    @if(empty(Auth::user()->icon))
                        <img class="img-fluid"  width="300" height="300"  src="{{ asset('img/icon/noimage.png') }}" alt="Noimage" />
                    @else
                        <img class="img-fluid"  width="300" height="300"  src="{{ asset('img/icon/' .  Auth::user()->icon) }}" alt="プロフィール画像" />
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</header>
<main class="py-4">
    
<div class="d-flex justify-content-around">
    <div class="col-5 ml-3">
    <h1 class="my-3 ml-3">投稿履歴</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>金額</th>
                    <th>投稿詳細</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service['title'] }}</td>
                    <td>{{ $service['amount'] }}</td>
                    <td><a href="{{ route('user.service.detail', ['service' => $service['id']]) }}">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-5 ml-3">
    <h1 class="my-3 ml-3">依頼履歴</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>期日</th>
                    <th>依頼詳細</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                <tr>
                    <td>{{ $request['service']['title'] }}</td>
                    <td>{{ $request['deadline'] }}</td>
                    <td><a href="{{ route('user.request.detail', ['requests' => $request['id']]) }}">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</main>
@endsection