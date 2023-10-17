@extends('header')
@section('content')

<main class="bg-Info py-5">
    <div class="container bg-Info px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-left text-xl-start">
                    <h1 class="display-5 fw-bolder text-black mb-2">{{ $servicedetail['title'] }}</h1>
                    <h2 class="display-6 fw-bolder text-black mb-2">{{ number_format($servicedetail['amount']) }}円</h2>
                    <p class="lead fw-normal text-black-50 mb-4">{!! nl2br(e($servicedetail['content'])) !!}</p>

                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                @if(empty($servicedetail->image))
                    <img class="img-fluid rounded-3 my-5" src="{{ asset('img/noimage.png') }}" alt="Noimage" />
                @else
                    <img class="img-fluid rounded-3 my-5" src="{{ asset('img/' .  $servicedetail->image) }}" alt="イメージ画像" />
                @endif
            </div>
        </div>
    </div>
    <div class="container px-5 justify-content-around">
        <div class="d-flex justify-content-around">
            <a class="btn bg-danger btn-lg px-4 mt-3" href="{{ route('delete.service.conf', ['service' => $servicedetail['id']]) }}">投稿削除</a>
            <a class="btn btn-primary btn-lg px-4 mt-3  " href="{{ route('edit.service', ['service' => $servicedetail['id']]) }}">内容編集</a>
            <button id="btn--back" class="btn btn-primary btn-lg px-4 mt-3">戻る</button>
                <script> 
                    const back = document.getElementById('btn--back'); back.addEventListener('click', (e) => { history.back(); return false; }); 
                </script>
        </div>
    </div>
</main>
@endsection