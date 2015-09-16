@extends('layouts.master')

@section('title', '楽天クエスト')

<div class="main_picture">

</div>

@section('body')
<div class="achivement">
  <h2>達成度</h2>
  <div class="achievement_graph row">
    <div class="goods col-md-3">
      <div class="goods_pic img-thumbnail">
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg" class="img-responsive" alt="gumi">
      </div>
      <div class="change_goods text-center">
        <button type="button" class="btn btn-default">Default</button>
      </div>
    </div>
    <div class="progress_bar col-md-9">
      <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
        </div>
      </div>
      <div class="percent panel">
        <div class="panel-heading">
          賞品獲得まで現在
        </div>
        <div class="panel-body">
          77%
        </div>
      </div>
      <div class="goods_point">
        1000000pt
      </div>
      <div class="got_point">
        3pt
      </div>
      <div class="remaining_point">
        999997pt
      </div>
    </div>
  </div>
</div>

<div class="quest_list table-responsive">
  <div class="panel">
    <div class="panel-heading">
      <h2>クエストリスト</h2>
    </div>
    <div class="panel-body  panel panel-danger">
      <table class="table table-hover">
        <tr>
          <td>
            掃除
          </td>
          <td>
            50pt
          </td>
          <td>
            <button type="button" class="btn btn-danger">おわった！</button>
          </td>
        </tr>
        <tr>
          <td>
            手伝い
          </td>
          <td>
            100pt
          </td>
          <td>
            <button type="button" class="btn btn-danger">おわった！</button>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>

<div class="history">
  <div class="total_point">
    <h3>今までの獲得ポイント</h3>
  </div>
  <div class="got_goods">
    <h3>戦利品</h3>
    <div class="got_goods_pictures img-thumbnail">
      <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg" class="img-responsive" alt="gumi">
    </div>
  </div>
  <div class="past_quest">
    過去のクエスト
  </div>
</div>
@endsection

@section('footer')

@endsection
