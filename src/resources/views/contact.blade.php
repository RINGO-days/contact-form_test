@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection

@section('title')
<p>Contact</p>
@endsection

@section('main')
<div class="contact-form">
    <form action="/confirm" method="POST">
        @csrf
            <div class="contact-form__group">
                <div class="contact-form__ttl">お名前
                    <span style="color:red;">※</span></div>
                <div class="contact-form__input-name">
                    <input class="contact-form__input-item" type="text" name="last_name" value="{{ old('last_name', session('contact.last_name')) }}" placeholder="  例：山田">
                    <input class="contact-form__input-item" type="text" name="first_name" value="{{ old('first_name', session('contact.first_name')) }}"  placeholder="  例：太郎">
                </div>
            </div>

            <div class="contact-form__group">
                <div class="contact-form__ttl">性別
                    <span style="color:red;">※</span>
                </div>
                <div class="contact-form__input-gender">
                    <span><input type="radio" name="gender" value="1"
                    {{ old('gender', session('contact.gender')) == '1' ? 'checked' : '' }}>男性</span>
                    <span><input type="radio" name="gender" value="2"
                    {{ old('gender', session('contact.gender')) == '2' ? 'checked' : '' }}>女性</span>
                    <span><input type="radio" name="gender" value="3"
                    {{ old('gender', session('contact.gender')) == '3' ? 'checked' : '' }}>その他</span>
                </div>
            </div>

            <div class="contact-form__group">
                <div class="contact-form__ttl">メールアドレス
                    <span style="color:red;">※</span>
                </div>
                <div class="contact-form__input">
                    <input class="contact-form__input-item" type="email" name="email" value="{{ old('email', session('contact.email')) }}"  placeholder="  例：test@example.com">
                </div>
            </div>

            <div class="contact-form__group">
                <div class="contact-form__ttl">電話番号
                    <span style="color:red;">※</span>
                </div>
                <div class="contact-form__input-tel">
                    <input class="contact-form__input-item-tel" type="tel" maxlength="3" name="first_tel" value="{{ old('first_tel', session('contact.first_tel')) }}" placeholder="080">
                        <span>-</span>
                    <input class="contact-form__input-item-tel" type="tel" maxlength="4" name="mid_tel" value="{{ old('mid_tel', session('contact.mid_tel')) }}" placeholder="1234">
                        <span>-</span>
                    <input class="contact-form__input-item-tel" type="tel" maxlength="4" name="last_tel" value="{{ old('last_tel', session('contact.last_tel')) }}" placeholder="5678">
                    </div>
                </div>
            </div>

            <div class="contact-form__group">
                <div class="contact-form__ttl">住所
                    <span style="color:red;">※</span>
                </div>
                <div class="contact-form__input">
                    <input class="contact-form__input-item" type="text" name="address" value="{{ old('address', session('contact.address')) }}" placeholder="  例：東京都世田谷区千駄ヶ谷1-2-3">
                </div>
            </div>

            <div class="contact-form__group">
                <div class="contact-form__ttl">建物名</div>
                <div class="contact-form__input">
                    <input class="contact-form__input-item"type="text" name="building" value="{{ old('building', session('contact.building')) }}" placeholder="  例：千駄ヶ谷マンション101">
                </div>
            </div>

            <div class="contact-form__group">
                <div class="contact-form__ttl">お問い合わせの種類
                    <span style="color:red;">※</span>
                </div>
                <div class="contact-form__category">
                    <select  class="contact-form__select" name="category">
                        <option hidden>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('category',session('contact.category') == $category->id ? 'selected' : '')}}>
                            {{$category->content}}</option>
                        @endforeach
                    </select>
                    <span>▼</span>
                </div>
            </div>

                <div class="contact-form__group">
                    <div class="contact-form__ttl">お問い合わせ内容
                        <span style="color:red;">※</span>
                    </div>
                <div class="contact-form__input">
                    <textarea class="contact-form__input-textarea" type="textarea" name="text" placeholder=" お問い合わせ内容をご記載ください">{{old('text',session('contact.text'))}}</textarea>
                </div>
            </div>
        </div>
        <div class="button__inner">
            <button class="button__submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
