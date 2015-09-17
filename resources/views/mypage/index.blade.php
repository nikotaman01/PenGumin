@extends('layouts.master')

@section('title', '楽天クエスト')
<?php
// ダミーステータス
//$isParent = false;
$didAccept = true;
//$gotPoint = 6191;
//$goodsPoint = 1000;
$totalPoint = 7000;
$gotGoodsList = array(
  array(
    'picture' => 'https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg',
    'name' => 'Haribo 6人衆',
    'gotDate' => '2015/09/16'
  )
);
$pastQuestList = array(
  array(
    'name' => 'さんぽ',
    'point' => '2',
    'count' => '3'
  ),
  array(
      'name' => 'かたたたき',
      'point' => '1',
      'count' => '132'
  )
);
$doneQuestList = array(
  array(
    'name' => '親孝行',
    'point' => '9999',
    'quest_id' => '1'
  ),
  array(
      'name' => 'かたたたき',
      'point' => '1',
      'quest_id' => '2'
  )
);
$allQuestList = array(
  array(
    'name' => '親孝行',
    'point' => '9999',
    'quest_id' => '1'
  ),
  array(
      'name' => 'かたたたき',
      'point' => '1',
      'quest_id' => '2'
  ),
  array(
      'name' => '排水口のぬめり取り',
      'point' => '3',
      'quest_id' => '3'
  )
);
?>

@if ($isParent)
  @section('body')
  <div class="achivement container text-center">
    <h2>達成度</h2>
    <div class="achievement-graph row">
      <div class="goods col-md-3">
        <div class="goods-pic img-thumbnail">
          <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg" class="img-responsive" alt="gumi">
        </div>
        @if ($didAccept)
        <form method="POST" action="{{action('MypageController@index')}}" accept-charset="UTF-8">
          <div class="accept-goods">
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-warning">承認取消</button>
          </div>
        </form>
        @else
        <form method="POST" action="{{action('MypageController@index')}}" accept-charset="UTF-8">
          <div class="accept-goods">
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-success">賞品承認</button>
          </div>
        </form>
        @endif
      </div>
      <div class="progressbar col-md-8">
        @if ($goodsPoint == null)
          <h4>賞品が選択されていません</h4>
          <?php $percent = 0; ?>
        @else
          <div class="progress">
            <?php $percent = round($gotPoint/$goodsPoint*100); ?>
            <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width: {{$percent}}%">
              {{$percent}} %
            </div>
          </div>
        @endif
        </div>
        <div class="status">
          <div class="percent panel panel-warning col-md-3">
            <div class="panel-heading">
              <h6>現在のステータス</h6>
            </div>
            <div class="panel-body">
              @if ($goodsPoint == null)
              <h4>--- %</h4>
              @else
              <h4>{{$percent}} %</h4>
              @endif
            </div>
          </div>
          <div class="goods-point panel panel-success col-md-3">
            <div class="panel-heading">
              <h6>賞品の必要ポイント</h6>
            </div>
            <div class="panel-body">
              <h4>{{$goodsPoint}} pt</h4>
            </div>
          </div>
          <div class="got-point panel panel-info col-md-3">
            <div class="panel-heading">
              <h6>現在の獲得ポイント</h6>
            </div>
            <div class="panel-body">
              <h4>{{$gotPoint}} pt</h4>
            </div>
          </div>
          <div class="remaining-point panel panel-danger col-md-3">
            <div class="panel-heading">
              <h6>賞品獲得まであと</h6>
            </div>
            <div class="panel-body">
              <?php $remainingPoint = $goodsPoint - $gotPoint; ?>
              <h4>{{$remainingPoint}} pt</h4>
            </div>
          </div>
        </div>
        @if ($percent >= 100)
        <form method="POST" action="{{action('MypageController@index')}}" accept-charset="UTF-8">
          <div class="buy col-md-3 col-md-offset-9">
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-danger btn-lg">購入</button>
          </div>
        </form>
        @endif
      </div>
    </div>
  </div>
  <br>

  <div class="quest-accept container table-responsive">
    <div class="panel panel-danger text-center">
      <div class="panel-heading">
        <h2>お手伝い完了報告</h2>
      </div>
      <div class="panel-body">
        <table class="table table-hover text-center">
          @foreach ($doneQuestList as $quest)
          <tr>
            <td>
              <h4>{{$quest['name']}}</h4>
            </td>
            <td>
              <h4>{{$quest['point']}} pt</h4>
            </td>
            <form method="POST" action="{{action('MypageController@index', $quest['quest_id'])}}" accept-charset="UTF-8">
              <td>
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-danger">承認</button>
              </td>
            </form>
          </tr>
          @endforeach
        </table>
      </div>
      <form method="POST" action="{{action('MypageController@index')}}" accept-charset="UTF-8">
        <div class="quest-edit panel-footer text-center">
          {!! csrf_field() !!}
          <button type="submit" class="btn btn-info">クエストの追加・削除</button>
        </div>
      </form>
    </div>
  </div>

  @endsection

@else
  @section('body')
  <div class="achivement container text-center">
    <h2>達成度</h2>
    @if ($goodsPoint == null)
    <div class="got-point panel panel-success col-md-6">
      <div class="panel-heading">
        <h2>目的の賞品をえらんでね！</h2>
      </div>
      <div class="panel-body">
        <form method="GET" action="{{action('SelectController@index')}}" accept-charset="UTF-8">
          <div class="change-goods">
            <button type="submit" class="btn btn-primary">賞品選択</button>
          </div>
        </form>
      </div>
    </div>
    <div class="got-point panel panel-info col-md-6">
      <div class="panel-heading">
        <h3>現在の獲得ポイント</h3>
      </div>
      <div class="panel-body">
        <h4>{{$gotPoint}} pt</h4>
      </div>
    </div>
    @else
    <div class="achievement-graph row">
      <div class="goods col-md-3">
        <div class="goods-pic img-thumbnail">
          <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Haribo-goldbaeren-2007.jpg" class="img-responsive" alt="gumi">
        </div>
        <form method="GET" action="{{action('SelectController@index')}}" accept-charset="UTF-8">
          <div class="change-goods">
            <button type="submit" class="btn btn-primary">賞品変更</button>
          </div>
        </form>
      </div>
      <div class="progressbar col-md-8">
        <div class="progress">
          <?php
          $percent = round($gotPoint/$goodsPoint*100);
          ?>
          <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width: {{$percent}}%">
          {{$percent}} %
          </div>
        </div>
        <div class="status">
          <div class="percent panel panel-warning col-md-3">
            <div class="panel-heading">
              <h6>現在のステータス</h6>
            </div>
            <div class="panel-body">
              <h4>{{$percent}} %</h4>
            </div>
          </div>
          <div class="goods-point panel panel-success col-md-3">
            <div class="panel-heading">
              <h6>賞品の必要ポイント</h6>
            </div>
            <div class="panel-body">
              <h4>{{$goodsPoint}} pt</h4>
            </div>
          </div>
          <div class="got-point panel panel-info col-md-3">
            <div class="panel-heading">
              <h6>現在の獲得ポイント</h6>
            </div>
            <div class="panel-body">
              <h4>{{$gotPoint}} pt</h4>
            </div>
          </div>
          <div class="remaining-point panel panel-danger col-md-3">
            <div class="panel-heading">
              <h6>賞品獲得まであと</h6>
            </div>
            <div class="panel-body">
              <?php $remainingPoint = $goodsPoint - $gotPoint; ?>
              <h4>{{$remainingPoint}} pt</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
  <br>

  <div class="quest-list container table-responsive">
    <div class="panel panel-danger text-center">
      <div class="panel-heading">
        <h2>クエストリスト</h2>
      </div>
      <div class="panel-body">
        <table class="table table-hover text-center">
          @foreach ($allQuestList as $quest)
          <tr>
            <td>
              <h4>{{$quest['name']}}</h4>
            </td>
            <td>
              <h4>{{$quest['point']}} pt</h4>
            </td>
            <form method="POST" action="{{action('MypageController@index', $quest['quest_id'])}}" accept-charset="UTF-8">
              <td>
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-danger">おわった！</button>
              </td>
            </form>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>

  <div class="history container">
    <h2>あしあと</h2>
    <div class="total-point panel panel-dengar">
      <h3>今までの総獲得ポイント: {{$totalPoint}} pt</h3>
    </div>
    <br>
    <div class="got-goods">
      <h3>戦利品</h3>
      @foreach ($gotGoodsList as $goods)
      <div class="got-goods-pictures img-thumbnail col-md-4 text-center">
        <img src="{{$goods['picture']}}" class="img-responsive" alt="獲得賞品">
        <div class="goods-name">
          <h4>{{$goods['name']}}</h4>
        </div>
        <div class="got-date">
          <h4>{{$goods['gotDate']}}</h4>
        </div>
      </div>
      @endforeach
    </div>
    <br>
    <div class="past-quest col-md-12">
      <h3>達成したクエスト</h3>
        <table class="table table-striped text-center">
          @foreach ($pastQuestList as $quest)
          <tr>
            <td>
              <h4>{{$quest['name']}}</h4>
            </td>
            <td>
              <span class="badge"><h4>{{$quest['count']}} 回</h4></span>
            </td>
            <td class="panel panel-info">
              <h4>計 {{$quest['count'] * $quest['point']}} pt</h4>
            </td>
          </tr>
          @endforeach
        </table>
    </div>
  </div>
  @endsection

@endif


@section('footer')

@endsection
