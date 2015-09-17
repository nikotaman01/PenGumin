@extends('layouts.master')

@section('title', '楽天クエスト | メール送信完了')

@section('body')
親
<div class="container">
	<div class="panel panel-danger">
		<div class="panel-heading">
		メール送信完了
		</div>
		<div class="panel-body">
		{{ old('childEmail') }} 宛てに招待メールを送信いたしました。
		</div>
	</div>
	<div class="panel panel-warning">
		<div class="panel-body">
			<p style="color:red;">まだ登録は完了していません</p>
			<p>メールを確認の上、登録を完了してください。</p>
			<p>(デバッグ)<a href="/invite/register?code=wefiwuehn12e13r3">登録へ</a></p>
		</div>
	</div>
</div>
@stop