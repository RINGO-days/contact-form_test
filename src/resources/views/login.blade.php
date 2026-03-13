@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title')
Login
@endsection


@section('nav')
<a href='/register'>
    <button class="register-button">Register</button>
</a>
@endsection

@section('flash_message')
@if(count($errors) > 0)
<span class="message-info">入力内容に誤りがありました</span>
@elseif(session('result'))
<span class="message-info" style="color: green;">{{session('result')}}</span>
@endif
@endsection

@section('main')
<div class="login-box">
    <form action="/login" method="post">
        @csrf
        <div class="login-form__item">
            <p>メールアドレス</p>
            <input class="login-form__input @error('email') input-error @enderror" type="email" name="email" value="{{old('email')}}" placeholder="例：test@example.com">
            <div class="error-message__box">
                @error('email')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="login-form__item">
            <p>パスワード</p>
            <input class="login-form__input @error('email') input-error @enderror"  type="password" name="password" placeholder="例：coachtech1106">
            <div class="error-message__box">
                @error('password')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="button__inner">
            <button class="button__submit">ログイン</button>
        </div>
    </form>
</div>
@endsection