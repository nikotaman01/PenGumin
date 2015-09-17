@extends('layouts.master')
@section('title', '賞品選択')

<?php

$count = 0;
// 連想配列から値を取得
if(isset($indata)){
    $data = $indata['keyword'];
    // 検索数
    $count = $data['count'];
    // 商品情報
    $item_list = $data['Items'];

    $word = $indata['word'];
    $kword = $word['keyword'];
}
?>
@section ('body')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<br>
<div class="search text-center">
  <form action="#" method="GET">
        <h3>欲しい賞品で検索しよう！</h3>
        <br>
        <input type="text" class="form-control input" placeholder="検索ワード" name="keyword" value="{{ Input::get('keyword')}}" size="30">
        <br>
        <input type="submit" class="btn btn-danger" value="検索">
  </form>
</div>

@if ($count > 0)
<div class="quest-list container table-responsive">
  <div class="panel panel-danger text-center">
    <div class="panel-heading">
      <h3>見つかった件数: {{number_format($count)}}件</h3>
    </div>
    <div class="panel-body">
      <table class="table table-hover text-center">
        @foreach ($item_list as $data)
        <?php $item = $data['Item']; ?>
        <form action="#" method="POST">
          <tr>
            <td>
              <button type="submit" class="btn btn-danger" name="diceide">決定</button>
              <input type="hidden" name="item_name" value="{{$item['itemName']}}">
              <input type="hidden" name="code" value="{{$item['itemCode']}}">
              <input type="hidden" name="image" value="{{$item['mediumImageUrls'][0]['imageUrl']}}">
              <input type="hidden" name="price" value="{{$item['itemPrice']}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </td>
            <td>
              <a href="{{$item['itemUrl']}}" target="_top"><img src="{{$item['mediumImageUrls'][0]['imageUrl']}}" border=0></a>
            </td>
            <td>
              <a href="{{$item['itemUrl']}}" target="_top"><font size="-1">{{$item['itemName']}}</a>
            </td>
            <td>
              <span style="font-size: 20px;color: red;">{{number_format($item['itemPrice'])}} pt</span>
            </td>
          </tr>
        </form>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endif


@endsection
