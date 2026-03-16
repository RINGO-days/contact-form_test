@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('title')
Confirm
@endsection

@section('main')
<div class="contact-confirm">
    <table class="contact-confirm-table">
        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">お名前</th>
            <td class="contact-confirm__item">{{$contact['last_name']}} {{$contact['first_name']}}</td>
        </tr>

        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">性別</th>
            <td class="contact-confirm__item">
                @if($contact['gender'] == 1)
                    男性
                @elseif($contact['gender'] == 2)
                    女性
                @elseif($contact['gender'] == 3)
                    その他
                @endif
            </td>
        </tr>
        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">メールアドレス</th>
            <td class="contact-confirm__item">{{$contact['email']}}</td>
        </tr>
        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">電話番号</th>
            <td class="contact-confirm__item">{{$contact['tel']}}</td>
        </tr>
        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">住所</th>
            <td class="contact-confirm__item">{{$contact['address']}}</td>
        </tr>
        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">建物名</th>
            <td class="contact-confirm__item">{{$contact['building']}}</td>
        </tr>
        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">お問い合わせの種類</th>
            <td class="contact-confirm__item">{{$contact['category_content']}}</td>
        </tr>
        <tr class="contact-confirm__raw">
            <th class="contact-confirm__ttl">お問い合わせ内容</th>
            <td class="contact-confirm__item">{{$contact['detail']}}</td>
        </tr>
    </table>
</div>
<div class="button__inner">
    <form action="/thanks" method="post">
        @csrf
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        <button class="button__submit">送信</button>
    </form>
    <form action="/" method="post">
        @csrf
        <button class="button__revise">修正</button>
    </form>
</div>
@endsection