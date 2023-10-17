@extends('header')
@section('content')

    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">新規依頼</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">スキルシェアの依頼内容の登録をお願いします</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">

                    <form action="{{ route('create.request') }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type='hidden' class='form-control' name='service_id' value="{{ $serviceId }}"/>
                        <input type='hidden' class='form-control' name='title' value="{{ $servicedetail['title'] }}"/>

                        <div class="form-floating mb-3">
                            <label for='title'>【依頼先】</label>
                            <div class="mt-3"><h3>{{ $servicedetail['title'] }}</h3></div>
                        </div>

                        <div class="form-floating mb-3">
                            <label for='content' class='mt-2'>内容</label>
                                <textarea class='form-control' name='content' style="height: 10rem" placeholder="Enter content...">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        
                        <div class="form-floating mb-3">
                            <label for='tel'>電話番号</label>
                                <input type='text' class='form-control' name='tel' value="{{ old('tel') }}"  placeholder="090☓☓☓☓◯◯◯◯"/>
                                @error('tel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for='email' class='mt-2'>メールアドレス</label>
                                <input type='text' class='form-control' name='email' id='email' placeholder="☓☓☓@gmail.com" value="{{ Auth::user()->email }}"/>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for='deadline' class='mt-2'>期日</label>
                                <input type='date' class='form-control' name='deadline' id='deadline' placeholder="☓☓☓@gmail.com" value="{{ old('deadline') }}"/>
                                @error('deadline')
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