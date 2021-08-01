@extends('layouts.app')

@section('content')

@if (session('message'))
<div class="alert alert-danger text-center">
    {{ session('message') }}
</div>
@endif
　
<div class="client">
    <div class="container mt-4 offset-3 flex">
        <div class="a a1">
            <form class="search" enctype="multipart/form-data" action="" accept-charset="UTF-8" method="get">
                @csrf

                <div class="searchBox">
                    <div class="a2">
                        <h2 class="mr-2">名前</h2>
                        <input type="text" name="product_name" class="form-control" value="">
                    </div>
                    <div class="a2">
                        <h2 class="mr-2">住所</h2>
                        <input type="text" name="product_name" class="form-control" value="">
                    </div>
                    <div class="a2">
                        <h2 class="mr-2">　</h2>
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary ml-4" value="検索">
                        </span>
                    </div>
                </div>

            </form>
        </div>
        <div class="a a2">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="file">
                    <br><br>
                    <button class="btn btn-success">ボタンをクリック</button>
                </div>
            </form>
            <input type="submit" class="b btn btn-success ml-4" value="取込">
            <a href="{{ route('export') }}">
                <button class="btn btn-secondary">出力</button>
            </a>
            <input type="submit" class="b btn btn-danger ml-4" value="登録">
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="panel panel-default">
        <div class="panel-heading">全件</div>
        <div class="panel-body">
        </div>
        <table border="1" class="table" style="border-collapse: collapse">
            @foreach($clients as $client)
            <thead class="bg-success">
                <tr>
                    <th>名前</th>
                    <th>住所</th>
                    <th>連絡先</th>
                    <th>メールアドレス</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$client->client_name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
            @endforeach　
        </table>
    </div>
</div>
</div>
@endsection