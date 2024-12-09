# coachtech
「Coachtech」はフリマアプリです。商品を購入したり不要品を出品することが出来ます。また商品のお気に入り登録と商品に対してのコメントを投稿することも出来ます。

## 作成した目的
Laravel学習のまとめとして作成いたしました。提示された要件や成果物のイメージをもとに設計・コーディングを行いました。

## アプリケーションURL
デプロイしていないためURLはありません

## 他のリポジトリ
ありません

## 使用技術
1. PHP 7.4.9
2. Laravel v8.83.8
3. mysql:8.0.26
4. Fortify
5. JavaScript
6. Laravel-Permission
7. Stripe
8. Mailtrap

## 機能一覧
・会員登録機能→メールアドレス、パスワードが入力項目となっています。  
・ログイン機能→メールアドレス、パスワードでログイン出来、ログアウト機能もついています。  
・検索機能→商品名検索が可能です。  
・プロフィール編集機能→プロフィール画像、 名前、郵便番号、住所、建物名が登録出来ます。  
・支払い方法登録機能→クレジットカード、コンビニ、銀行振込の3つのいずれかから1つ選択し登録出来ます。   
・コンビニもしくは銀行振込を選択した場合に「購入する」ボタンを選択すると購入完了ページに遷移します。  
・stripe決済機能→支払い方法にクレジットカードが登録されている場合に「購入する」ボタンを選択するとstripe決済画面が表示されるため任意の情報を入力することでデモ決済することが出来ます。(デモ決済用のダミーカード番号は4111111111111111となっております。)  
・お気に入り機能→出品された商品ごとに灰色の星マークが表示されており、お気に入り追加した場合マークが黄色に、お気に入りを削除した場合マークが灰色に戻ります。お気に入りに追加した商品は商品一覧ページのマイリストで閲覧可能です。(マイリストは非会員ユーザーには表示されないタブになっております。)  
・商品詳細閲覧機能→商品一覧ページ内に配置されている各商品画像を選択すると商品の詳細画面に遷移します。  
・出品機能→商品画像、カテゴリー、商品の状態、商品名、商品の詳細、販売価格を登録出来ます。なお商品の詳細は任意の項目となります。  
・コメント投稿機能→出品された商品にコメントを投稿することが出来ます。  
・コメント削除機能→出品した商品に対してのコメントを削除することが出来ます。

### 管理者専用機能
・ユーザー削除機能→管理者専用ユーザー一覧ページよりユーザー情報の削除が可能です。  
・コメント削除機能→管理者専用コメント一覧ページよりユーザーが投稿したコメントの削除が可能です。  
・お知らせメール送信機能→管理者専用お知らせメール作成ページより管理者を含まないユーザー全員に対して一斉にお知らせメールの作成及びメール送信が可能です。メールサービスはMailtrapを使用しております。
    
### 非会員ユーザーには利用できない機能
・お気に入り追加と削除機能  
・コメント追加と削除機能(商品のコメント閲覧は可能)  
・出品機能  
・商品購入機能  

## 機能に関する注意点 
・支払い方法登録は商品購入ページ内の支払い方法欄に「変更する」という文字があるのでその文字を選択して専用ページに遷移してください。   
・住所登録は商品購入ページ内の支払い方法欄に「変更する」という文字があるのでその文字を選択して専用ページに遷移してください。建物名以外は登録必須項目になっています。  
・商品の購入は支払い先及び配送先の両項目の登録が完了してから行えます。(プロフィールのユーザー名とプロフィール画像が未設定でも商品購入が可能です。)  
・商品の出品はプロフィールのユーザー名とプロフィール画像を登録することで使用可能な機能となります。  
・コメント削除は商品の出品者が行える機能です。マイページの出品した商品より該当の商品を選択することでコメント削除専用ページに遷移出来ます。このページ内のコメントごとにごみ箱アイコンが設置されているのでアイコンを選択すると該当コメントを削除出来ます。  
・非ログイン状態でヘッダーの「出品」ボタン、星マーク、「コメントを送信する」ボタン、商品詳細ページ内の「購入する」ボタンを選択するとログインページに遷移します。なお非会員ユーザーはログインページの「会員登録はこちら」リンクを選択して会員の登録をお願いいたします。  

## ダミーデータの説明
1.	管理者  
・ユーザー名: 管理者  
・メールアドレス: admin@admin.com  
・パスワード: password  
2.	テストユーザー  
・ユーザー名: test  
・メールアドレス: test@example.com  
・パスワード: password

## テーブル設計
![image](https://github.com/user-attachments/assets/bc0cf55b-8213-4793-a179-9665538c2431)  
![image](https://github.com/user-attachments/assets/983b6a6f-6149-4ec3-92b3-c5ad91799f00)  
![image](https://github.com/user-attachments/assets/e380b1fd-2b26-4f90-a73f-4dd579051611)
![image](https://github.com/user-attachments/assets/38efb5b2-1b44-465a-9176-1482ca2095fb)  
![image](https://github.com/user-attachments/assets/f267315e-eca3-4225-9532-cb735ee307e6)  
![image](https://github.com/user-attachments/assets/3b820dde-f980-4543-8e8e-39fb4d6bb7f2)

## ER図
![image](https://github.com/user-attachments/assets/67f6a60e-b9c6-4248-9e97-fa604c0b4043)  
![image](https://github.com/user-attachments/assets/78c4ae72-0f90-4874-89db-fd8d76f26fdf)

## 環境構築

### コマンドライン上
$docker-compose up -d -build  
$docker-compose exec php bash

### PHPコンテナ内
$composer install  
$composer require laravel/cashier

### src上
$cp .env.example .env

### PHPコンテナ内
$php artisan key:generate  
$php artisan migrate  
$php artisan db:seed  
$php artisan storage:link
