<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="keywords" content="楽天,PenGumin">
<meta name="author" content="PenGumin">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<title>楽天 ログイン</title>
</head>
<body>
<img src="/images/rakuten-logo.jpg" width="100">
<hr style="border 3px;">
<div class="container">

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			入力に誤りがあります。<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-danger">
				<div class="panel-heading">
					楽天会員ログイン
				</div>
				<div class="panel-body">
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
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					まだ楽天会員に登録されていない方
				</div>
				<div class="panel-body">
					新規登録は<a href="/auth/register">こちらから</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

