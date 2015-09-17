@extends('layouts.master')

@section('title', '楽天新規登録')

@section('body')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			楽天新規登録
		</div>
		<div class="panel-body">
			<div class="input-group">
				<form action="/auth/register" method="POST">
					<label>名前</label>
					<input type="text" name="name">
					<label>emailアドレス</label>
					<input type="email" name="email">
					<input type="submit" class="btn btn-primary" value="登録">
					<input type="hidden" value="{{ $data['code'] }}" name="code">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
			</div>

		</div>
	</div>
</div>
@stop