@extends('layouts.auth')
@section('content')

<main class="py-4">
    
<div class="d-flex justify-content-around">
    <div class="col-5 ml-3">
    <h1 class="my-3 ml-3">ユーザーリスト</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>投稿件数</th>
                    <th>処理</th>
                </tr>
            </thead>
            <tbody>
                @foreach($delete_users as $delete_user)
                <tr>
                    <td>{{ $delete_user['name'] }}</td>
                    <td>{{ $delete_user['service_count'] }}</td>
                    <td><a href="{{ route('restart.user.conf', ['id' => $delete_user['id']]) }}">再開</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-5 ml-3">
    <h1 class="my-3 ml-3">投稿リスト</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>違反件数</th>
                    <th>ユーザーID</th>
                    <th>処理</th>
                </tr>
            </thead>
            <tbody>
                @foreach($violation_list as $violation)
                <tr>
                    <td>{{ $violation['service']['title'] }}</td>
                    <td>{{ $violation['count_serviceId'] }}</td>
                    <td>{{ $violation['service']['user_id'] }}</td>
                    <td><a href="{{ route('stop.user.conf', ['id' => $violation['service']['user_id']]) }}">停止</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</main>
@endsection