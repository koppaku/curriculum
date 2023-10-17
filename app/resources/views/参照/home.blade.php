@extends('layout')
@section('content')

    <main class="py-4">
    <!-- 日付検索 -->
    <!-- https://tinyurl.com/26cw6re9 -->
        <div class="row justify-content-around">
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ route('search') }}">
                        <div class="card-header">
                            <div class='text-center'>日付検索</div>
                        </div>
                        <div class="card-body d-flex justify-content-around">
                            <div class='d-flex'>
                                <input type="date" name="from" id='from' placeholder="from_date" value="{{ $from }}">
                                <span class="mx-3">～</span>
                                <input type="date" name="until" id='until' placeholder="until_date" value="{{ $until }}">
                            </div>
                            <div class='d-flex'>
                                <button type="submit"  class='btn btn-primary'>検索</button>
                            </div>
                        </div>
                        <div class="text-center text-danger">{{ $message }}</div>
                    </form>
                </div>
            </div>
        </div>

    <!-- 収入・支出登録ボタン -->
        <div class='row justify-content-around mt-3'>
            <a href="{{ route('create.income') }}">
                <button type='button' class='btn btn-primary'>+ 収入</button>
            </a>
            <a href="{{ route('create.spend') }}">
                <button type='button' class='btn btn-primary'>- 支出</button>
            </a>
        </div>
        <div class="row justify-content-around mt2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>収入</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>詳細</th>
                                        <th scope='col'>日付</th>
                                        <th scope='col'>金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに収入を表示する -->
                                    <!-- bladeの場合は＠を使って記載する -->
                                @foreach($incomes as $income)
                                    <tr>                                 
                                        <th scope='col'>
                                            <a href=" {{ route('income.detail', ['income' => $income['id']]) }}">#</a>
                                        </th>
                                        <th scope='col'>{{ $income['date'] }}</th>
                                        <th scope='col'>{{ $income['amount'] }}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <th scope='col'>詳細</th>
                                    <th scope='col'>日付</th>
                                    <th scope='col'>金額</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ここに支出を表示する -->
                                <!-- bladeの場合は＠を使って記載する -->
                                @foreach($spends as $spend)
                                    <tr>
                                        <th scope='col'>
                                            <a href="{{ route('spend.detail', ['spending' => $spend['id']]) }}">#</a>
                                        </th>
                                        <th scope='col'>{{ $spend['date'] }}</th>
                                        <th scope='col'>{{ $spend['amount'] }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
