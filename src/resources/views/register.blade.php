@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('nav')
<a href="/login">
    <button class="login-button">Login</button>
</a>
@endsection

@section('title')
    <p>Register</p>
@endsection

@section('main')
<div class="register-box">
    <form action="/">
        <div class="register-form__item">
            <p>お名前</p>
            <input class="register-form__input" type="text" name="name" placeholder="例：山田 太郎">
        </div>
        <div class="register-form__item">
            <p>メールアドレス</p>
            <input class="register-form__input" type="email" name="email" placeholder="例：test@example.com">
        </div>
        <div class="register-form__item">
            <p>パスワード</p>
            <input class="register-form__input" type="password" name="password" placeholder="例：coachtech1106">
        </div>
        <div class="button__inner">
            <button class="button__submit">登録</button>
        </div>
    </form>
</div>
@endsection

