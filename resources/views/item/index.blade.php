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
            <input type="search" placeholder="商品名検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
            <div class="button-search">
                <button type="submit">検索</button>
                <button>
                    <a href="{{ route('index') }}" class="text-black">クリア</a>
                </button>
            </div>
        </form>
        <!---検索バーここまで--->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">商品一覧</h3>
                <div class="card-tools">
<<<<<<< HEAD
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                        @can('admin-higher') {{-- 管理者権限のみに表示される --}}
                            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                        @endcan
=======
                    <div class="input-group input-group-sm"></div>
                    <div class="input-group-append">
                        @if(Auth::user()->name == '')
                            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                        @endif
>>>>>>> 1eed1f547ec1f3b259ef25248e7d2bb97d942927
                        </div>
                    </div>
                </div>
            </div>
            <div id="items">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="sort test-id" data-sort="id">ID</th>
                                <th class="sort test-name" data-sort="name">商品名</th>
                                <th class="sort test-price" data-sort="price">金額</th>
                                <th class="sort test-quantity" data-sort="quantity">在庫数</th>
                                <th class="sort test-type" data-sort="type">種別</th>
                                <th class="test-edit">詳細</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($items as $item)
                            <tr>
                                <td class="id">{{ $item->id }}</td>
                                <td class="name">{{ $item->name }}</td>
                                <td class="price">{{ $item->price }}</td>
                                <td class="quantity">{{ $item->quantity }}</td>
                                <td class="type">{{\App\Models\Item::TYPE_LIST[$item->type] }}</td>
                                <td class="detail">{{ $item->detail }}</td>
                                <td>
<<<<<<< HEAD
                                @can('admin-higher') {{-- 管理者権限のみに表示される --}}
                                <a href="{{ url('/item_update/'.$item -> id) }}" class="button_edit">編集</a>
                                @endcan
=======
                                @if(Auth::user()->name == '')
                                    <a href="{{ url('/item_update/'.$item -> id) }}" class="button_edit">編集</a>
                                @endif
>>>>>>> 1eed1f547ec1f3b259ef25248e7d2bb97d942927
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
</div>
@stop

@section('css')
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
                    <script>
                        let options = {
                            valueNames: ['id', 'name', 'price', 'quantity', 'type', ]
                        };
                        let userList = new List('items', options);
                        // 初期状態はidで昇順ソートする
                        userList.sort('id', {
                            order: 'asc'
                        });
                    </script>
@stop