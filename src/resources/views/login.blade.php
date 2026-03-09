@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title')
<p>Login</p>
@endsection

@section('nav')
<a href="/register">
    <button class="register-button">Register</button>
</a>
@endsection

@section('main')
<div class="login-box">
    <form action="/">
        <div class="login-form__item">
            <p>メールアドレス</p>
            <input class="login-form__input" type="email" name="email" placeholder="例：test@example.com">
        </div>
        <div class="login-form__item">
            <p>パスワード</p>
            <input class="login-form__input" type="password" name="password" placeholder="例：coachtech1106" >
        </div>
        <div class="button__inner">
            <button class="button__submit">登録</button>
        </div>
    </form>
</div>
@endsection