@extends('header')
@section('content')

    <header class="bg-Info py-5">

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
    </header>
    <main class="py-4">
        <div class="d-flex align-items-center justify-content-center">
            <div class="fw-bold">
                @if(empty($servicedetail->user->icon))
                    <img class="rounded-circle me-3"  width="100" height="100"  src="{{ asset('img/icon/noimage.png') }}" alt="Noimage" />
                @else
                    <img class="rounded-circle me-3"  width="100" height="100"  src="{{ asset('img/icon/' .  $servicedetail['user']['icon']) }}" alt="プロフィール画像" />
                @endif
            </div>
            <div class="fw-bold">
                {{ $servicedetail['user']['name'] }}
                <span class="fw-bold text-primary mx-1">/</span>
                {{ $servicedetail['user']['email'] }}
            </div>
        </div>

        <!-- いいね機能 -->
        <div class="d-flex align-items-center justify-content-center">
            @if($like_model->like_exist(Auth::user()->id,$servicedetail->id))
            <p class="favorite-marke">
            いいね
            <a class="js-like-toggle loved" href="" data-postid="{{ $servicedetail->id }}"><i class="fas fa-heart" style="font-size:36px;color:red"></i></a>
            <span class="likesCount">{{$servicedetail->likes_count}}</span>
            </p>
            @else
            <p class="favorite-marke">
            いいね
            <a class="js-like-toggle" href="" data-postid="{{ $servicedetail->id }}"><i class="fas fa-heart" style="font-size:36px;"></i></a>
            <span class="likesCount">{{$servicedetail->likes_count}}</span>
            </p>
            @endif
        </div>

        <div class="container px-5 justify-content-around">
            <div class="d-flex justify-content-around">
                <a class="btn btn-primary btn-lg px-4 mt-3" href="{{ route('request_form', ['service' => $servicedetail['id']]) }}">依頼登録</a>
                <a class="btn btn-primary btn-lg px-4 mt-3  " href="{{ route('violation_form', ['service' => $servicedetail['id']]) }}">違反登録</a>
                <button id="btn--back" class="btn btn-primary btn-lg px-4 mt-3">戻る</button>
                    <script> 
                        const back = document.getElementById('btn--back'); back.addEventListener('click', (e) => { history.back(); return false; }); 
                    </script>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <script>
    $(function () {
    var like = $('.js-like-toggle');
    var likePostId;
    
    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'service_id': likePostId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });
</script>
    
@endsection