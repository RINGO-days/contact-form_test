# 基礎学習ターム　確認テスト_お問い合わせフォーム

## 環境構築
* `` git clone git@github.com:RINGO-days/contact-form_test.git ``
* `` docker-compose up -d --build ``
* `` cd src ``
* `` cp .env.example .env ``
* 作成した.envファイル内(11~16行目)を以下に変更  
      -``DB_CONNECTION=mysql``  
      -``DB_HOST=mysql`` ※  
      -``DB_PORT=3306``  
      -``DB_DATABASE=laravel_db``　※  
      -``DB_USERNAME=laravel_user``※  
      -``DB_PASSWORD=laravel_pass``※  
* `` docker-compose exec php bash ``
* `` composer install　``
* `` php artisan key:generate``
* `` php artisan migrate:fresh --seed ``

## 使用技術（実行環境）
-　Laravel 8.83.29
- PHP 8.１
- MySQL
- fortify

## ER図
![ER図](ER図.svg)

## URL
* 開発環境　http://localhost/
