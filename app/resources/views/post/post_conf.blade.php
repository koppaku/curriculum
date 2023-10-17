@extends('header')
@section('content')
<main class="py-4">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h1 class='text-center'>投稿確認</h1>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('comp.post') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                        <input type='hidden' class='form-control' name='title' value="{{ $title }}"/>
                        <textarea style="display:none" class='form-control' name='content'>{{ $content }}</textarea>
                        <input type='hidden' class='form-control' name='amount' id='date' value="{{ $amount }}"/>
                        <input type="hidden" name="image" value="{{ $newImageName }}">

                        <div class="container bg-Info px-5">
                            <div class="row gx-5 align-items-center justify-content-center">
                                <div class="col-lg-8 col-xl-7 col-xxl-6">
                                    <div class="my-5 text-center text-xl-start">
                                        <h1 class="display-5 fw-bolder text-black mb-2">{{ $title }}</h1>
                                        <p class="lead fw-normal text-black-50 mb-4">{{ $content }}</p>
                                        <p class="lead fw-normal text-black-50 mb-4">{{ $amount }}円</p>

                                    </div>
                                </div>
                                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                                    <img class="img-fluid rounded-3 my-5" src="{{ $image }}" alt="イメージ画像" />
                                </div>
                            </div>
                        </div>

                        <div class='row justify-content-around'>
                                <button type='submit' class='btn btn-primary btn-lg px-4 mt-3'>投稿</button>
                           </div> 
                    </form>
                    <div class='row justify-content-around'>
                        <button id="btn--back" class="btn btn-primary btn-lg px-4 mt-3">戻る</button>
                            <script> 
                                const back = document.getElementById('btn--back'); back.addEventListener('click', (e) => { history.back(); return false; }); 
                            </script>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</main>
@endsection