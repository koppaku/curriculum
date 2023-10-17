@extends('header')
@section('content')

<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">違反登録</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">公序良俗に反する、個人情報漏洩などの内容を含む内容がありましたら<br>こちらに登録をお願いします</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">

                <form action="{{ route('create.violation') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <input type='hidden' class='form-control' name='service_id' value="{{ $serviceId }}"/>
                    <input type='hidden' class='form-control' name='title' value="{{ $servicedetail['title'] }}"/>
                    <input type='hidden' class='form-control' name='content' value="{{ $servicedetail['content'] }}"/>

                    <div class="form-floating mb-3">
                        <label for='title'>【違反タイトル】</label>
                        <div class="mt-3"><h3>{{ $servicedetail['title'] }}</h3></div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for='content'>【違反内容】</label>
                        <div class="mt-3"><p>{{ $servicedetail['content'] }}</p></div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for='comment' class='mt-2'>コメント</label>
                            <textarea class='form-control' name='comment' style="height: 10rem" placeholder="Enter comment...">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    
                    <div class='row justify-content-around'>
                        <button type='submit' class='btn btn-primary btn-lg px-4 mt-3'>内容を確認する</button>
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
</section>

@endsection