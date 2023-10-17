@extends('header')
@section('content')
<main class="flex-shrink-0">
    <!-- Page Content-->
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">依頼詳細</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Experience Section-->
                <section>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h2 class="text-primary fw-bolder mb-0"><a href="{{ route('service.detail', ['service' => $requestdetail['service_id']]) }}">{{ $requestdetail['service']['title'] }}</a></h2>
                        <!-- Download resume button-->
                        <!-- Note: Set the link href target to a PDF file within your project-->
                        <a class="btn btn-primary btn-lg px-4" href="{{ route('edit.request', ['requests' => $requestdetail['id']]) }}">
                            <div class="d-inline-block bi bi-download me-2"></div>
                            変更
                        </a>
                    </div>
                    <!-- Experience Card 1-->
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            <div class="row align-items-center gx-5">
                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                    <div class="bg-light p-4 rounded-4">
                                        <div class="text-primary fw-bolder mb-2">{{ $requestdetail['status']['choice'] }}</div>
                                        <div class="small fw-bolder">{{ $requestdetail['tel'] }}</div>
                                        <div class="small text-muted">{{ $requestdetail['email'] }}</div>
                                        <div class="small text-muted">{{ $requestdetail['deadline'] }}</div>
                                    </div>
                                </div>
                                <div class="col-lg-8"><div>{!! nl2br(e($requestdetail['content'])) !!}</div></div>
                            </div>
                        </div>
                    </div>
                </section>
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