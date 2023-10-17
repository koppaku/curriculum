@extends('header')
@section('content')
<main class="py-4">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h1 class='text-center'>投稿削除確認</h1>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('delete.service.comp', ['service' => $id]) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                        <input type='hidden' class='form-control' name='title' value="{{ $instance['title'] }}"/>
                        <textarea style="display:none" class='form-control' name='content'>{{ nl2br($instance['content']) }}</textarea>
                        <input type='hidden' class='form-control' name='amount' id='date' value="{{ $instance['amount'] }}"/>
                        <input type="hidden"  name="image" value="{{ $instance['image'] }}"/> 

                        <div class="container bg-Info px-5">
                            <div class="row gx-5 align-items-center justify-content-center">
                                <div class="col-lg-8 col-xl-7 col-xxl-6">
                                    <div class="my-5 text-center text-xl-start">
                                        <h1 class="display-5 fw-bolder text-black mb-2">{{ $instance['title'] }}</h1>
                                        <p class="lead fw-normal text-black-50 mb-4">{{ $instance['content'] }}</p>
                                        <p class="lead fw-normal text-black-50 mb-4">{{ $instance['amount'] }}円</p>

                                    </div>
                                </div>
                                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                                @if(is_null($instance->image))
                                    <img class="img-fluid rounded-3 my-5" src="{{ asset('img/noimage.png') }}" alt="Noimage" />
                                @else
                                    <img class="img-fluid rounded-3 my-5" src="{{ asset('img/' .  $instance->image) }}" alt="イメージ画像" />
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class='row justify-content-around'>
                                <button type='submit' class='btn btn-primary btn-lg px-4 mt-3'>削除</button>
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