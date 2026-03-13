@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('title')
Admin
@endsection

@section('nav')
<form action="/logout" method="post">
    @csrf
    <button class="logout-button">Logout</button>
</form>
@endsection

@section('flash_message')
@if(session('result'))
<span class="message-info" style="color: green;">{{session('result')}}</span>
@elseif(session('success'))
<span class="message-info" style="color: green;">{{session('success')}}</span>
@endif
@endsection

@section('main')
<div class="content-box">
    <form action="/admin/search" method="get">
    <div class="search-box">
        <input class="search__text" type="text" name="keyword" value="{{
        request('keyword')}}" placeholder="名前やメールアドレスを入力してください">
        <div class="gender-box">
            <select class="search__gender" name="gender">
                <option value="" {{request('gender') == '' ? 'selected' : ''}} hidden>性別</option>
                <option value="1" {{request('gender') == '1' ? 'selected' : ''}}>男性</option>
                <option value="2" {{request('gender') == '2' ? 'selected' : ''}}>女性</option>
                <option value="3" {{request('gender') == '3' ? 'selected' : ''}}>その他</option>
            </select>
            <span class="select-icon">▼</span>
        </div>
        <div class="category-box">
            <select class="search__category" name="category">
                <option value=""hidden>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : '' }}>{{$category->content}}</option>
                @endforeach
            </select>
            <span class="select-icon">▼</span>
        </div>
        <div class="date-box">
            <input class="search__date" type="date" value="{{request('updated_at')}}" name="updated_at">
            <span class="select-icon">▼</span>
        </div>
        <button class="search__button">検索</button>

    <a href="/admin" class="search__reset">
        リセット
    </a>
</form>
    </div>
    <div class="other-tool-box">
        <button class="export__button">エクスポート</button>
        <div class="pagination">
    {{ $contacts->links('pagination::bootstrap-4') }}
</div>
    </div>
    <div class="contact-list">
        <table class="contact-list__table">
            <tr class="contact-list__table__header-raw">
                <th class="contact-list__table__header">お名前</th>
                <th class="contact-list__table__header">性別</th>
                <th class="contact-list__table__header">メールアドレス</th>
                <th class="contact-list__table__header">お問い合わせの種類</th>
                <th></th><!-- モーダル表示ボタンtdタグ用の空欄 -->
            </tr>
            @foreach($contacts as $contact)
            <tr class="contact-list__table__item-raw">
                <td class="contact-list__table__item">{{$contact->last_name}}　{{$contact->first_name}}</td>
                <td class="contact-list__table__item">
                    @if($contact->gender == 1)
                        男性
                    @elseif($contact->gender == 2)
                        女性
                    @else
                        その他
                    @endif</td>
                <td class="contact-list__table__item">{{$contact->email}}</td>
                <td class="contact-list__table__item__category">
                    {{$contact->category->content}}
                </td>

                <td>
                    <a href="#modal-{{$contact->id}}" class="button__modal">詳細</a>
                    <div class="modal" id="modal-{{$contact->id}}">
                        <div class="modal-inner">
                            <a href="#" class="close-button">&times;</a>
                            <table class="modal-table">
                                <tr class="model-table__row">
                                    <th>お名前</th>
                                    <td>{{$contact->last_name}} {{$contact->first_name}}</td>
                                </tr>
                                <tr class="model-table__row">
                                    <th>性別</th>
                                    <td>
                                        @if($contact->gender == 1)
                                            男性
                                        @elseif($contact->gender == 2)
                                            女性
                                        @else
                                            その他
                                        @endif
                                    </td>
                                </tr>
                                <tr class="model-table__row">
                                    <th>メールアドレス</th>
                                    <td>{{$contact->email}}</td>
                                </tr>
                                <tr class="model-table__row">
                                    <th>電話番号</th>
                                    <td>{{$contact->tel}}</td>
                                </tr>
                                <tr class="model-table__row">
                                    <th>住所</th>
                                    <td>{{$contact->address}}</td>
                                </tr>
                                <tr class="model-table__row">
                                    <th>建物名</th>
                                    <td>
                                        @if(empty($contact->building))
                                            ---
                                        @else
                                            {{$contact->building}}
                                        @endif
                                    </td>
                                </tr>
                                <tr class="model-table__row">
                                    <th>お問い合わせの種類</th>
                                    <td>{{$contact->category->content}}</td>
                                </tr>
                                <tr class="model-table__row">
                                    <th>お問い合わせの内容</th>
                                    <td>{{$contact->detail}}</td>
                                </tr>
                            </table>
                            <div class="delete-button__inner">
                                <form action="/delete" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-button" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    <input type="hidden" value="{{$contact->id}}" name="id">
                                </form>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection