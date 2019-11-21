# Gutenberg の練習

## guten-01

ハンドブックの[JavaScript Build Setup](https://developer.wordpress.org/block-editor/tutorials/javascript/js-build-setup/) 通りに環境構築してみたやつ。

この guten-01 をダウンロードしてきて/wp-content/plugins/に突っ込めばプラグインとして読み込める。

ただし内容は div を吐き出すだけのカスタムブロックが１個追加されるだけ。

guten-01 ディレクトリで `npm install` すれば必要な node_modules が揃って開発環境が構築できます。

▼ ビルド

```bash
$ npm run build #本番用（ちゃんと圧縮したやつ）
$ npm start #開発用（圧縮されない / ファイル保存時に自動ビルドしてくれる）
```

## guten-fa

`<FontAwesomeIcon>`と`<FontIconPicker>`のテスト用。（_まだうまく使えるようになってないです。_）

WP5.3 以上じゃないと動かない。

▼ ビルド

「guten-01」とは違い、`npm start`でも圧縮するようにしている。

```bash
$ npm start
```
