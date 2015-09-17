@extends('layouts.master')

@section('title', '楽天クエスト')
<?php
// ダミーステータス
$isParent = true;
$got_point = 4;
$goods_point = 100;
?>

@if ($isParent)
  @section('body')
  <div class="achivement container text-center">
    <h2>達成度</h2>
    <div class="achievement_graph row">
      <div class="goods col-md-3">
        <div class="goods_pic img-thumbnail">
          <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg" class="img-responsive" alt="gumi">
        </div>
        <div class="accept_goods">
          <button type="button" class="btn btn-success">賞品承認</button>
          <!-- 承認済み -->
        </div>
      </div>
      <div class="progress_bar col-md-8">
        <div class="progress">
          <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width: 77%">
            {{round($got_point / $goods_point)}}
          </div>
        </div>
        <div class="status">
          <div class="percent panel panel-warning col-md-3">
            <div class="panel-heading">
              <h6>現在のステータス</h6>
            </div>
            <div class="panel-body">
              <h4>77 %</h4>
            </div>
          </div>
          <div class="goods_point panel panel-success col-md-3">
            <div class="panel-heading">
              <h6>賞品の必要ポイント</h6>
            </div>
            <div class="panel-body">
              <h4>1000000 pt</h4>
            </div>
          </div>
          <div class="got_point panel panel-info col-md-3">
            <div class="panel-heading">
              <h6>現在の獲得ポイント</h6>
            </div>
            <div class="panel-body">
              <h4>3 pt</h4>
            </div>
          </div>
          <div class="remaining_point panel panel-danger col-md-3">
            <div class="panel-heading">
              <h6>賞品獲得まであと</h6>
            </div>
            <div class="panel-body">
              <h4>999997 pt</h4>
            </div>
          </div>
        </div>
        <!-- if (ポイントたまったら) {}-->
        <div class="buy col-md-3 col-md-offset-9">
          <button type="button" class="btn btn-danger">購入</button>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="quest_accept container table-responsive">
    <div class="panel panel-danger text-center">
      <div class="panel-heading">
        <h2>お手伝い完了報告</h2>
      </div>
      <div class="panel-body">
        <!-- 子供側のおわった！が押されたら -->
        <table class="table table-hover text-center">
          <tr>
            <td>
              <h4>掃除</h4>
            </td>
            <td>
              <h4>50 pt</h4>
            </td>
            <td>
              <button type="button" class="btn btn-danger">承認</button>

            </td>
          </tr>
          <tr>
            <td>
              <h4>手伝い</h4>
            </td>
            <td>
              <h4>100 pt</h4>
            </td>
            <td>
              <button type="button" class="btn btn-danger">承認</button>
            </td>
          </tr>
          <tr>
            <td>
              <h4>親孝行</h4>
            </td>
            <td>
              <h4>999999999 pt</h4>
            </td>
            <td>
              <button type="button" class="btn btn-danger">承認</button>
            </td>
          </tr>
        </table>
      </div>
      <div class="quest_edit panel-footer text-center">
        <button type="button" class="btn btn-info">クエストの追加・削除</button>
      </div>
    </div>
  </div>

  @endsection

@else
  @section('body')
  <div class="achivement container text-center">
    <h2>達成度</h2>
    <div class="achievement_graph row">
      <div class="goods col-md-3">
        <div class="goods_pic img-thumbnail">
          <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg" class="img-responsive" alt="gumi">
        </div>
        <div class="change_goods">
          <button type="button" class="btn btn-primary">賞品変更</button>
        </div>
      </div>
      <div class="progress_bar col-md-8">
        <div class="progress">
          <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width: 77%">
            77 %
          </div>
        </div>
        <div class="percent panel panel-warning col-md-3">
          <div class="panel-heading">
            <h6>現在のステータス</h6>
          </div>
          <div class="panel-body">
            <h4>77 %</h4>
          </div>
        </div>
        <div class="goods_point panel panel-success col-md-3">
          <div class="panel-heading">
            <h6>賞品の必要ポイント</h6>
          </div>
          <div class="panel-body">
            <h4>1000000 pt</h4>
          </div>
        </div>
        <div class="got_point panel panel-info col-md-3">
          <div class="panel-heading">
            <h6>現在の獲得ポイント</h6>
          </div>
          <div class="panel-body">
            <h4>3 pt</h4>
          </div>
        </div>
        <div class="remaining_point panel panel-danger col-md-3">
          <div class="panel-heading">
            <h6>賞品獲得まであと</h6>
          </div>
          <div class="panel-body">
            <h4>999997 pt</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="quest_list container table-responsive">
    <div class="panel panel-danger text-center">
      <div class="panel-heading">
        <h2>クエストリスト</h2>
      </div>
      <div class="panel-body">
        <table class="table table-hover text-center">
          <tr>
            <td>
              <h4>掃除</h4>
            </td>
            <td>
              <h4>50 pt</h4>
            </td>
            <td>
              <button type="button" class="btn btn-danger">おわった！</button>
            </td>
          </tr>
          <tr>
            <td>
              <h4>手伝い</h4>
            </td>
            <td>
              <h4>100 pt</h4>
            </td>
            <td>
              <button type="button" class="btn btn-danger">おわった！</button>
            </td>
          </tr>
          <tr>
            <td>
              <h4>親孝行</h4>
            </td>
            <td>
              <h4>999999999 pt</h4>
            </td>
            <td>
              <button type="button" class="btn btn-danger">おわった！</button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="history container">
    <h2>あしあと</h2>
    <div class="total_point panel panel-dengar">
      <h3>今までの総獲得ポイント: 117 pt</h3>
    </div>
    <br>
    <div class="got_goods">
      <h3>戦利品</h3>
      <div class="got_goods_pictures img-thumbnail col-md-4 text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg" class="img-responsive" alt="gumi">
        <div class="goods_name">
          <h4>Haribo 6人衆</h4>
        </div>
        <div class="got_date">
          <h4>2015/09/16</h4>
        </div>
      </div>
    </div>
    <br>
    <div class="past_quest col-md-12">
      <h3>達成したクエスト</h3>
        <table class="table table-striped text-center">
          <tr>
            <td>
              <h4>かたたたき</h4>
            </td>
            <td>
              <span class="badge"><h4>3 回</h4></span>
            </td>
            <td class="panel panel-info">
              <h4>計 3 pt</h4>
            </td>
          </tr>
          <tr>
            <td>
              <h4>排水口のぬめり取り</h4>
            </td>
            <td>
              <span class="badge"><h4>14 回</h4></span>
            </td>
            <td class="panel panel-info">
              <h4>計 14 pt</h4>
            </td>
          </tr>
          <tr>
            <td>
              <h4>はじめてのおつかい</h4>
            </td>
            <td>
              <span class="badge"><h4>14 回</h4></span>
            </td>
            <td class="panel panel-info">
              <h4>計 100 pt</h4>
            </td>
          </tr>
        </table>
    </div>
  </div>
  @endsection

@endif


@section('footer')

@endsection
