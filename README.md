# ab_tool

## これは何？

abをWEBブラウザから実行するお遊びツールです。

## 使い方

### apacheとphpをインストール

```
yum install httpd php

```

### ドキュメントルートに移動し、clone

```
cd /var/www/html
git clone https://github.com/keisukesanuki/ab_tool.git
```

### 権限変更

```
chown apache ab_tool
```
### 変数定義

```
vi ab_tool/index.php
```

* $doc_root  ⇒  ドキュメントルートを定義

* $server_ip  ⇒  サーバのIPアドレスを定義

### ブラウザから接続

http://ipアドレス/ab_tool/