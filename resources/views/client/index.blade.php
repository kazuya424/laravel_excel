@extends('layouts.app')

@section('content')

@if (session('message'))
<div class="alert alert-danger text-center">
    {{ session('message') }}
</div>
@endif
　
<div class="client">
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1>商品検索画面</h1>
        </div>
    </div>


    <div class="container mt-4">
        <div class="panel panel-default">
            <div class="panel-heading">全件</div>
            <div class="panel-body">
            </div>
            <table border="1" class="table" style="border-collapse: collapse">

                <thead class="bg-warning">
                    <tr>
                        <th>商品名</th>
                        <th>商品化カテゴリ</th>
                        <th>価格</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>

            </table>

        </div>
    </div> 　
</div>
@endsection