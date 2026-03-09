@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('title')
<p>Admin</p>
@endsection

@section('nav')
<a href="">
    <button class="logout-button">Logout</button>
</a>
@endsection

@section('main')
<div class="content-box">
    <div class="search-box">
        <input class="search__text" type="text" placeholder="名前やメールアドレスを入力してください">
        <div class="gender-box">
            <select class="search__gender" name="gender">
                <option value="" hidden>性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <span>▼</span>
        </div>
        <div class="category-box">
            <select class="search__category" name="category">
                <option value=""hidden>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category['content']}}</option>
                @endforeach
            </select>
            <span>▼</span>
        </div>
        <div class="date-box">
            <input class="search__date" type="date" value="" name="appointment_at">
            <span>▼</span>
        </div>
        <button class="search__button">検索</button>
        <button class="search__reset">リセット</button>
    </div>
    <div class="other-tool-box">
        <button class="export__button">エクスポート</button>
        <!-- ページネーション -->
    </div>
    <div class="contact-list">
        <table class="contact-list__table" border="1"> <!-- 後で消す -->
            <tr class="contact-list__table__header-raw">
                <th class="contact-list__table__header">お名前</th>
                <th class="contact-list__table__header">性別</th>
                <th class="contact-list__table__header">メールアドレス</th>
                <th class="contact-list__table__header">お問い合わせの種類</th>
                <th class="contact-list__table__header"></th>
            </tr>
            <tr class="contact-list__table__item">
                <td>a</td><!-- マイグレーション -->
                <td>a</td><!-- マイグレーション -->
                <td>a</td><!-- マイグレーション -->
                <td>a</td><!-- マイグレーション -->
                <td>a</td><!-- マイグレーション -->
            </tr>
        </table>
    </div>
</div>
@endsection