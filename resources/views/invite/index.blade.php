@extends('layouts.master')

@section('title', '楽天クエストに新規登録')

@section('body')
親
<div class="container">
	<div class="jumbotron">
	  <h1>楽天クエスト登録で<br><span style="color:red;">2000ポイント</span>プレゼント！</h1>
	  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
	</div>
	<div class="panel panel-warning">
		<div class="panel-heading">
			楽天クエストとは？？
		</div>
		<div class="panel-body">
			楽天クエストでは、小中学生のお子様を対象に、家のお手伝いや学校の宿題など、親から言ってもなかなかやってもらえないことをゲーム感覚で取り組めるサービスを提供しております。

		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			楽天クエスト新規登録
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							ご利用方法
						</div>
						<div class="panel-body">
							下のフォームにお子様のメールアドレスを入力して、楽天クエスト開始の親子情報の紐付けを行います。
						</div>
						<div>
							<form  action="/invite/email" method="POST">
								<div class="input-group">
									<input type="text" class="form-element" name="childEmail">
									<button class="btn btn-primary"type="submit">招待する！!</button>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="/auth/logout">ログアウト</a>
	</div>
</div>
@stop