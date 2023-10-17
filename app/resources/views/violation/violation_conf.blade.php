@extends('header')
@section('content')

<main class="flex-shrink-0">
    <!-- Page Content-->
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">違反内容確認</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <form action="{{ route('comp.violation') }}" method="post">
                @csrf
                    <input type='hidden' class='form-control' name='service_id' value="{{ $violations['service_id'] }}"/>
                    <input type='hidden' class='form-control' name='comment' value="{{ $violations['comment'] }}"/>

                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h2 class="text-primary fw-bolder mb-0">{{ $violations['title'] }}</h2>
                            <!-- Download resume button-->
                            <!-- Note: Set the link href target to a PDF file within your project-->
                            <div class='row'>
                            <button type='submit' class='btn bg-danger'>違反登録</button>
                            </div>  
                        </div>
                        <!-- Experience Card 1-->
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <div class="row align-items-center gx-5">
                                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                        <div class="bg-light p-4 rounded-4">
                                            <div class="small fw-bolder">【投稿内容】</div>
                                            <div class="small fw-bolder">{{ $violations['content'] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div>【違反コメント】</div>
                                        <div>{{ $violations['comment'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Experience Section-->

            </div>
        </div>
        <div class="text-center row justify-content-center">
            <button id="btn--back" class="btn btn-primary btn-lg px-4">戻る</button>
                <script> 
                    const back = document.getElementById('btn--back'); back.addEventListener('click', (e) => { history.back(); return false; }); 
                </script>
        </div>
    </div>
</main>

@endsection