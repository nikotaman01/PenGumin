@extends('layouts.master')

@section('title', '楽天にログイン')

@section('body')
子
<!-- <div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			楽天ログイン
		</div>
		<div class="panel-body">
			<div class="input-group">
				<form action="/auth/login" method="POST">
					<label>email</label>
					<input type="email" name="email">
					<label>パスワード</label>
					<input type="password" name="password">
					<input type="submit" class="btn btn-primary" value="登録">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
			</div>
		</div>
	</div>
</div> -->
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        メールアドレス
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        パスワード
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> ログインを継続する
    </div>

    <div>
        <button type="submit">ログイン</button>
    </div>
</form>
@stop