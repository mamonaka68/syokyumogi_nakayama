

#アプリケーション名
概要説明(どんなアプリか)

・勤怠管理システム(kadaiというdirの下にコード＋データを置いています)

社員様の情報(名前・メールアドレス・パスワード)を新規登録を行いユーザ管理を行いつつ、
登録済の社員様が本システムへログイン後に日々の勤務時間と休憩時間を各々開始/終了ボタンを打刻することで
勤怠時間を管理できるようにする。

・トップ画面の画像 ----- kadai dirの下にあるtop.JPG　を参照してください。

## 作成した目的

初級模擬案件用の課題に着手し、作成した成果物を提出する。


##アプリケーションURL

https://github.com/mamonaka68/syokyumogi_nakayama/tree/main/kadai
(すみません、上記urlのパスにはsyokyumogiとnakayamaの間にアンダーバーがあるのですが
このメモ帳ではアンダーバーが表記されずに" " になってしまいます)

##他のリポジトリ
html/css等のコードも同じリポジトリ環境に置いております。
(cssはsrc/publicの下にcssのdir 下に置きました)

##機能一覧
・ログイン機能(バリデーション
・ユーザー新規登録機能
・勤怠時間を打刻(入力)する機能
・勤務日毎での勤務時間表示させる機能

##使用技術(実行環境)
・Laravel 8.83.27
・php

 Dockerビルド
・開発環境をテキスト見ながら最初から作っていきました。
・docker-compose up -d --build



##Laravel環境構築
1.docker-compose exec php bash
2.composer create-project "laravel/laravel=8.*" . --prefer-dist
3.env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate


URL
・開発環境：http://localhost/
・phpMyAdmin:http://localhost:8080/


##テーブル設計

   kadai dirの下にあるtable.JPG　を参照してください。

##ER図

  kadai dirの下にあるER.JPG を参照してください。


##他に記載することがあれば記述する。
・phpMyAdmin:http://localhost:8080/にあるテーブル(users/works/rets)にいくつかのテストデータを登録しています。
このテストデータを使用して動作確認を行いました。(ユーザー登録者：12人、勤務期間：2024-7-24～2024-8-9まで)


・打刻ページの上記の日付一覧を押すと、勤務日毎の出勤者の勤務時間データが表示されますが、5人を超えるケースで
6人目を表示させたときに別の勤務日(最新日)の勤務時間が表示されてしまい正しく動作ができていません。
(NG.JPGの画像を参照してください)
　　