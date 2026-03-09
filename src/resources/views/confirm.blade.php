@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('title')
<p>Confirm</p>
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
            <th class="contact-confirm__ttl">メースアドレス</th>
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
            <td class="contact-confirm__item">{{$contact['text']}}</td>
        </tr>
    </table>
</div>
<div class="button__inner">
    <form action="/thanks">
        @csrf
        <button class="button__submit">送信</button>
    </form>
    <form action="/" method="post">
        @csrf
        <button class="button__revise">修正</button>
    </form>
</div>
@endsection