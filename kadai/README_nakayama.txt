[初級模擬案件開発中]

Dockerビルド
・開発環境をテキスト見ながら最初から作っていきました。
・docker-compose up -d --build



Laravel環境構築
1.docker-compose exec php bash
2.composer create-project "laravel/laravel=8.*" . --prefer-dist
3.env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate


URL
・開発環境：http://localhost/
・phpMyAdmin:http://localhost:8080/

アプリケーション名
kadai
