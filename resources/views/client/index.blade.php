@extends('layouts.app')

@section('content')

<!-- エラーメッセージ表示 -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- 成功メッセージ表示 -->
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
　
<div class="client">
    <div class="container mt-4 offset-2 flex">
        <div class="a a1" style="width:400px;">
            <form class="search" enctype="multipart/form-data" action="{{route('client.index')}}" accept-charset="UTF-8" method="get">
                @csrf
                <div class="searchBox">
                    <div class="a2">
                        <h2 class="mr-2">顧客名</h2>
                        <input type="text" name="client_name" class="form-control" value="{{isset($client_name) ? $client_name : "" }}">
                    </div>
                    <div class="a2">
                        <h2 class="mr-2">　</h2>
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-success ml-4" value="検索">
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
                    <button class="btn btn-success">&emsp;取込&emsp;</button>
                </div>
            </form>
            <form action="{{ route('export') }}" method="GET" enctype="multipart/form-data">
                @csrf
                    <div class="form-group" >
                        <input type="hidden" name="client_name" class="form-control" value="{{$client_name ? $client_name : "" }}">
                    　 　<input type="text" name="export_name" placeholder="ファイル名を入力">
                        <button class="btn btn-secondary" style="width: 90px; margin-left: 121px;">出力</button>
                    </div>
            </form>
            <!-- <input type="submit" class="b btn btn-danger" value="登録"> -->
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="panel panel-default">
        <div class="panel-heading">全件{{$datas->total()}}件</div>
        <div class="panel-body">
        </div>
        <table border="1" class="table" style="border-collapse: collapse">
            @foreach($datas as $data)
            <thead class="bg-success">
                <tr>
                    <th>名前</th>
                    <th>連絡先</th>
                    <th>メールアドレス</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$data->client_name}}</td>
                    <td>{{$data->client_PhoneNumber}}</td>
                    <td>{{$data->client_email}}</td>
                </tr>

            </tbody>
            @endforeach　
        </table>
        <!-- 検索結果を保持したままページネーションできる-->
        {{ $datas->appends(request()->input())->links() }}
    </div>
</div>
</div>
@endsection