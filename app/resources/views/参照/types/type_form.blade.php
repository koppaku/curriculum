@extends('layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>項目</h1>
                </div>
                <div class='panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('create.type', ['category' => $typeno])}}" method="post">
                            @csrf
                            <label for='name'>名前</label>
                                <input type='text' class='form-control' name='name'/>
                            <label for='category' class='mt-2'>カテゴリ</label>
                            <select name='category' class='form-control'>
                                <option value='' hidden>カテゴリ</option>
                                @if($typeno == 0)
                                <option value="0" selected>支出</option>
                                <option value="1">収入</option>
                                @elseif($typeno == 1)
                                <option value="0" >支出</option>
                                <option value="1" selected>収入</option>
                                @endif
                            </select>

                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection