@extends('layouts.master')

@section('title', '楽天新規登録')

@section('body')
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
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <p>楽天新規登録</p>
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
        <div class="col-md-6"></div>
    </div>
</div>

<p>ログインは<a href="/auth/register">こちら</a></p>

@stop