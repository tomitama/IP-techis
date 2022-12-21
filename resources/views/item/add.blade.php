@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="商品名">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type" placeholder="選択してください">
                                @foreach(\App\Models\Item::TYPE_LIST as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
            
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">金額</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="金額">
                        </div>

                        <div class="form-group">
                            <label for="quantity">在庫数</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="在庫数">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
