@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
<h1>商品一覧</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <!----検索バーここから--->
<form method="GET" class="item-form" action="{{ route('index') }}">
    <input type="search" placeholder="検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div class="button-search">
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('index') }}" class="text-black">クリア</a>
        </button>
    </div>
</form>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">商品一覧</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>商品名</th>
                            <th>金額</th>
                            <th>在庫数</th>
                            <th>種別</th>
                            <th>詳細</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{\App\Models\Item::TYPE_LIST[$item->type] }}</td>
                            <td>{{ $item->detail }}</td>
                            <td><a href="{{ url('/item_update/'.$item -> id) }}" class="button_edit">編集</a>
                                <!---idを渡す処理が必要---->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $items->links();}}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop