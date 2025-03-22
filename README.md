## 東京都特化型民泊アプリ

## URL
https://10th-offline-roomify-master-vzxyrl.laravel.cloud/

ユーザー情報
laravelのseeder機能を使いデフォルトのユーザー、宿泊施設を登録してあります。

| username  | email | password |
|------|----|----------|
| guest1  | guest1@example.com | password |
| guest2  | guest2@example.com | password |
| host    | host@example.com   | password |
| admin   | admin@example.com  | password |

### 技術スタック
- PHP(laravel11 laravel/ui)
- vanilla javascript
- API(google map, paypal, pusher)
- laravel cloud
- aws s3

### 機能・特徴
このアプリケーションでは
guest, 
host, 
admin, 
non-loged-in-user, 
の4つのroleがあります。
- guest 宿泊先の検索・予約が可能
- host  guestの機能に加えて宿泊施設の登録・編集・削除が可能
- admin guestやhost、宿泊施設のban, ユーザーへの警告の送信

### 担当箇所
- 宿泊施設の登録・編集・削除
- メッセージ機能全般
- ユーザーの宿泊予約時の通知、adminユーザーからの警告通知、guestのhost申請等の重要通知機能の作成
- paypalへの接続・ローディング画面の作成
- レビュー全般
- エコフレンドリーポイントによる宿泊施設のランク決定機能

### 工夫した点
宿泊施設の登録ではgoogle maps apiを使用し、座標を使用して住所からgoogle mapのロケーションが自動で表示されるようにしました。
また、東京限定の民泊アプリということで住所から区を識別して、cityとしてカラムを作成したことで検索機能へのスムーズな結び付けを可能にしました。

メッセージ機能ではPusherを使用してリアルタイム通信を可能にしました。
また、guest同士でのメッセージはできないように制限することで、不要なユーザー同士のトラブルを避ける設計にしました。

paypalでの支払い機能ではcaptureのみ実装しております。
paypalページへの接続に時間がかかるためローディング画面を挿入することでローディング中であることを一目でわかるようにしています。

レビュー画面ではjsを使用してスライドバー表示をできるようにしています。宿泊施設の詳細ページからレビューをクリックすることでスライドバーが表示されます。
星１〜５で選べるようになっており、レビューの平均点も表示できるようにしております。
予約していないユーザーはレビューを書けないため、まず予約を行う必要がございます。


