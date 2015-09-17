<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="keywords" content="楽天,PenGumin">
<meta name="author" content="PenGumin">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>楽天新規登録</title>
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
                楽天新規登録
                </div>
                <div class="panel-body">
                    <form method="POST" action="/auth/register" >
                        {!! csrf_field() !!}
                            <div class="input-group">
                                <label>ユーザー名</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-element">
                                <label>メールアドレス</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-element">
                                <label>パスワード</label>
                                <input type="password" name="password" class="form-element">
                                <label>パスワード確認</label>
                                <input type="password" name="password_confirmation" class="form-element">
                                <button type="submit">登録</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                すでに登録されている方
                </div>
                <div class="panel-body">
    <p>ログインは<a href="/auth/login">こちら</a></p>

                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>