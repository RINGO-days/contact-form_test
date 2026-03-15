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
Register
@endsection

@section('flash_message')
@if(count($errors) > 0)
<span class="message-info">入力内容に誤りがありました</span>
@endif
@endsection


@section('main')
<div class="register-box">
    <form action="/register" method="post">
        @csrf
        <div class="register-form__item">
            <p>お名前</p>
            <input class="register-form__input @error('name') input-error @enderror" type="text" name="name" value="{{old('name')}}" placeholder="例：山田 太郎">
            <div class="error-message__box">
            @error('name')
                {{$message}}
            @enderror
            </div>
        </div>
        <div class="register-form__item">
            <p>メールアドレス</p>
            <input class="register-form__input @error('name') input-error @enderror" type="email" name="email" value="{{old('email')}}" placeholder="例：test@example.com">
            <div class="error-message__box">
            @error('email')
                {{$message}}
            @enderror
            </div>
        </div>
        <div class="register-form__item">
            <p>パスワード</p>
            <input class="register-form__input @error('name') input-error @enderror" type="password" name="password" placeholder="例：coachtech1106">
            <div class="error-message__box">
            @error('password')
                {{$message}}
            @enderror
            </div>

        </div>
        <div class="button__inner">
            <button class="button__submit">登録</button>
        </div>
    </form>
</div>
@endsection

