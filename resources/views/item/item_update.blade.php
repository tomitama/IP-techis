@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<h1>商品編集</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>エラーが起こっています。</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card card-primary">
            <form method="POST" action="/item_update/{{$id}}">
                <div class="card-header">
                    <h3 class="card-title">ID【No.{{$id}}】商品編集</h3>
                </div>
                <div class="card-tools"></div>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">商品名</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="商品名" value="{{$name}}">
                    </div>

                    <div class="form-group">
                        <label for="type">種別</label>
                        <select class="form-control" id="type" name="type" placeholder="選択してください" value="{{$type}}">
                            @foreach(\App\Models\Item::TYPE_LIST as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">金額</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="金額" value="{{$price}}">
                    </div>

                    <div class="form-group">
                        <label for="quantity">在庫数</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="在庫数" value="{{$quantity}}">
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明" value="{{$detail}}">
                    </div>
                    <!--更新ボタン---->
                    <div class="input-button">
                        <input type="submit" value="更新" class="btn btn-primary">
            </form>
            <br>
            <!-- 削除ボタン -->
            <form action="/item_delete/{{$id}}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" onclick='return confirm("一度削除してしまうと戻せませんが、本当に削除してよいですか？");'>削除</button>
            </form>

        </div>

    </div>
</div>


@stop

@section('css')
@stop

@section('js')
@stop