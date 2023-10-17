@extends('header')
@section('content')
 
    <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">新規投稿</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">スキルシェアしたい案件の登録をお願いします</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">

                        <form action="{{ route('create.post') }}" method="post"  enctype="multipart/form-data">
                           @csrf
                            <div class="form-floating mb-3">
                                <label for='title'>タイトル</label>
                                    <input type='text' class='form-control' name='title' value="{{ old('title') }}"  placeholder="Enter title..."/>
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for='content' class='mt-2'>内容</label>
                                    <textarea class='form-control' name='content' style="height: 10rem" placeholder="Enter content...">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for='amount' class='mt-2'>金額</label>
                                    <input type='text' class='form-control' name='amount' id='date' placeholder="1,000～99,999" value="{{ old('amount') }}"/>
                                    @error('amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for='image' class='mt-2'>画像</label>
                                    <input type="file"  name="image" id="image" value=""/> 
                                    @error('image')
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