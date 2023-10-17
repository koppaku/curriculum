@extends('header')
@section('content')

    <main class="py-4">

    <body style="background:url({{ asset('img/background/backgroundimage.jpg') }});background-size:cover;">

        <!-- 検索 -->
            <div class="row justify-content-around">
                <div class="col-md-4 w-25 ">
                </div>  
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('search') }}">
                            <div class="card-header">
                                <div class='text-center'>スキルを探す</div>
                            </div>
                            <div class="card-body justify-content-around">
                                <div class=''>
                                    <div class='d-flex'>タイトル・内容</div>
                                    <input class='form-control' name='text' id='text' value="{{ $text }}">
                                </div>
                            </div>
                            <div class='card-body justify-content-around'>
                                <div>
                                    <div class='d-flex'>金額</div>
                                    <input type="number" name="from" step="1000" id='from' placeholder="1,000" value="{{ $from }}">
                                    <span class="mx-3">～</span>
                                    <input type="number" name="until" step="1000" id='until' placeholder="999,000" value="{{ $until }}">
                                </div>
                            </div>
                            <div class="text-center text-danger">{{ $message }}</div>
                            <div class="card-body justify-content-around">
                                <div class=''>
                                    お気に入り
                                    <input type="hidden" name="favorite" id="" value="0">
                                    <input type="checkbox" name="favorite" id="" value="1">
                                </div>
                            </div>
                            <div class='card-body justify-content-around'>
                                <button type="submit" class='btn btn-primary'>検索</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 w-25">
                    <img class="img-fluid rounded-3 my-5"  width="200" height="200"  src="{{ asset('img/background/header_girl.png') }}" alt="イメージ画像" />
                </div>  

            </div>
        <!-- 検索 -->

        <!-- 一覧 -->
        <div class="row gx-5 mt-5">
            @if($favorite == 1)
                <!-- お気に入りチェックあり -->
                @foreach($services as $service)
                    <!-- ソフトデリートされたユーザー投稿の非表示 -->
                    @if(isset($service['user']))                                
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <div class="card-body p-4">
                                    <a href="{{ route('service.detail', ['service' => $service['service']['id']]) }}">
                                        <div class="text-white badge bg-primary bg-gradient rounded-pill mb-2">詳細</div>
                                    </a>
                                    <p class="card-text mb-0">【タイトル】{{ $service['service']['title'] }}</p>
                                    <p class="card-text mb-0">【金　　額】{{ number_format($service['service']['amount']) }}円</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                            @if(empty($service['user']['icon']))
                                                <img class="rounded-circle me-3"  width="50" height="50"  src="{{ asset('img/icon/noimage.png') }}" alt="Noimage" />
                                            @else
                                                <img class="rounded-circle me-3"  width="50" height="50"  src="{{ asset('img/icon/' . $service['user']['icon']) }}" alt="プロフィール画像" />
                                            @endif                                <div class="small">
                                                    <div class="fw-bold">{{ $service['user']['name'] }}</div>
                                                    <div class="text-muted">{{ $service['user']['email'] }}</div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <!-- お気に入りチェックなし -->
                @foreach($services as $service)
                        <!-- ソフトデリートされたユーザー投稿の非表示 -->
                        @if(isset($service['user']))                                
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <div class="card-body p-4">
                                        <a href="{{ route('service.detail', ['service' => $service['id']]) }}">
                                            <div class="text-white badge bg-primary bg-gradient rounded-pill mb-2">詳細</div>
                                        </a>
                                        <p class="card-text mb-0">【タイトル】{{ $service['title'] }}</p>
                                        <p class="card-text mb-0">【金　　額】{{ number_format($service['amount']) }}円</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                                <div class="d-flex align-items-center">
                                                @if(empty($service['user']['icon']))
                                                    <img class="rounded-circle me-3"  width="50" height="50"  src="{{ asset('img/icon/noimage.png') }}" alt="Noimage" />
                                                @else
                                                    <img class="rounded-circle me-3"  width="50" height="50"  src="{{ asset('img/icon/' . $service['user']['icon']) }}" alt="プロフィール画像" />
                                                @endif                                <div class="small">
                                                        <div class="fw-bold">{{ $service['user']['name'] }}</div>
                                                        <div class="text-muted">{{ $service['user']['email'] }}</div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
            @endif
        </div>

        <!-- 一覧 -->

					
        <!-- 次ページ・前ページ -->
            <div class="row justify-content-around">

                {{ $services->links() }}
                
            </div>
        <!-- 次ページ・前ページ -->
        <!-- 次ページ・前ページ -->
            <!-- <div class="row justify-content-around">

                <div class="">
                    <a href="" class="" style="">
                    <span>前へ</span>
                    </a>
                </div>

                <div class="">1 / 4</div>
                <a class="" href="">
                    <span>次へ</span>
                </a>
                </div>
                
            </div> -->
        <!-- 次ページ・前ページ -->

    </main>
@endsection
