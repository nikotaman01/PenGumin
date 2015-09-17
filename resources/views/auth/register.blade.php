@extends('layouts.master')

@section('title', '楽天新規登録')

@section('body')
子
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
<p>楽天新規登録</p>
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        ユーザー名
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        メールアドレス
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        パスワード
        <input type="password" name="password">
    </div>

    <div>
        パスワード確認
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">登録</button>
    </div>
</form>
<a href="/auth/register">ログイン</a>

@stop