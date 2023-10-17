@extends('header')
@section('content')
    
<main class="flex-shrink-0">
    <!-- Page Content-->
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">依頼確認</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <form action="{{ route('comp.request') }}" method="post">
                @csrf
                    <input type='hidden' class='form-control' name='service_id' value="{{ $requests['service_id'] }}"/>
                    <input type='hidden' class='form-control' name='content' value="{{ $requests['content'] }}"/>
                    <input type='hidden' class='form-control' name='tel' value="{{ $requests['tel'] }}"/>
                    <input type='hidden' class='form-control' name='email' value="{{ $requests['email'] }}"/>
                    <input type='hidden' class='form-control' name='deadline' value="{{ $requests['deadline'] }}"/>

                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h2 class="text-primary fw-bolder mb-0">{{ $requests['title'] }}</h2>
                            <!-- Download resume button-->
                            <!-- Note: Set the link href target to a PDF file within your project-->
                            <div class='row'>
                            <button type='submit' class='btn btn-primary'>依頼投稿</button>
                            </div>  
                        </div>
                        <!-- Experience Card 1-->
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <div class="row align-items-center gx-5">
                                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                        <div class="bg-light p-4 rounded-4">
                                            <div class="small fw-bolder">内容:{{ $requests['content'] }}</div>
                                            <div class="small fw-bolder">TEL:{{ $requests['tel'] }}</div>
                                            <div class="small text-muted">email:{{ $requests['email'] }}</div>
                                            <div class="small text-muted">期日:{{ $requests['deadline'] }}</div>
                                        </div>
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