@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">管理者ログイン成功</div>

                <div class="card-body">
                    <a href="{{ route('adminpage') }}">管理者ページへ進む</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection