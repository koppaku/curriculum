@extends('layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>{{ $subject }}</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">

                        @if($subject == '支出')
                        <form action="{{ route('edit.spend', ['spending' => $id]) }}" method="post">
                        @elseif($subject == '収入')
                        <form action="{{ route('edit.income', ['income' => $id]) }}" method="post">
                        @endif
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
                            @csrf
                            <label for='amount'>金額</label>
                                <input type='text' class='form-control' name='amount' value="{{ $result['amount'] }}"/>
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ $result['date'] }}"/>
                            <label for='type' class='mt-2'>カテゴリ</label>
                            <select name='type_id' class='form-control'>
                                <option value='' hidden>カテゴリ</option>
                                @foreach($types as $type)
                                    @if($type['id'] == $result['type_id'])
                                    <option value="{{ $type['id'] }}" selected>{{ $type['name'] }}</option>
                                    @else
                                    <option value="{{ $type['id']}}">{{ $type['name'] }}</option>
                                    @endif

                                @endforeach
                            </select>

                            <!-- 支出を押したらtypeを0と表示 -->

                            <label for='comment' class='mt-2'>メモ</label>
                                <textarea class='form-control' name='comment'>{{ nl2br($result['comment']) }}</textarea>
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