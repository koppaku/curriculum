@extends('layout')
@section('content')

    <main class="py-4">
        <div class="row justify-content-around">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>支出</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>日付</th>
                                        <th scope='col'>金額</th>
                                        <th scope='col'>カテゴリ</th>
                                        <th scope='col'>コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに支出を表示する -->
                                    <!-- bladeの場合は＠を使って記載する -->
                                    <tr>
                                        <th scope='col'>{{ $spend_with_type['date'] }}</th>
                                        <th scope='col'>{{ $spend_with_type['amount'] }}</th>
                                        <th scope='col'>{{ $spend_with_type['type']['name'] }}</th>
                                        <th scope='col'>{{ $spend_with_type['comment'] }}</th>
                                    </tr>
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='d-flex justify-content-around'>
                    <div class='d-flex mt-3'>
                        <a href="{{ route('delete.spend', ['spending' => $spend_with_type['id']]) }}">
                            <button class='btn btn-secondary bg-danger text-dark'>削除</button>
                        </a>
                    </div>
                    <div class='d-flex mt-3'>
                        <a href="{{ route('edit.spend', ['spending' => $spend_with_type['id']]) }}">
                            <button class='btn btn-secondary'>編集</button>
                        </a>
                    </div>
                    <div class='d-flex mt-3'>
                        <a href="{{ route('logic.spend', ['spending' => $spend_with_type['id']]) }}">
                            <button class='btn btn-secondary bg-warning text-dark'>論理削除</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
