@extends('header')
@section('content')

<main class="page-section" id="contact">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">投稿編集</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">変更がありましたら修正をお願いします</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">

                <form action="{{ route('edit.service', ['service' => $id]) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <label for='title'>タイトル</label>
                            <input type='text' class='form-control' name='title' value="{{ $result['title'] }}"  placeholder="Enter title..."/>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <label for='content' class='mt-2'>内容</label>
                            <textarea class='form-control' name='content' style="height: 10rem" placeholder="Enter content...">{{ $result['content'] }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <label for='amount' class='mt-2'>金額</label>
                            <input type='text' class='form-control' name='amount' id='date' placeholder="1,000～99,999" value="{{ $result['amount'] }}"/>
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
                        <button type='submit' class='btn btn-primary btn-lg px-4 mt-3'>内容を変更する</button>
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
</main>
@endsection