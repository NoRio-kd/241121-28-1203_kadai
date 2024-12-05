241128 PHP課題3回

# ①課題名
リーンキャンバス作成(DB連携)

## ②課題内容（どんな作品か）
- アンケートに回答するとリーンキャンバスが作成される

## ③アプリのデプロイURL
http://norikikadowaki.sakura.ne.jp/php_kadai_lean/lean.php

## ⑤工夫した点・こだわった点
- SQL連携
- 前のページに戻ってデータ保持⇨3項演算子（Ternary Operator)（?:）
    - textareaはoptionとかと違ってvalue属性を扱えないのでpostでもう一度受け取る  <textarea type="text" id="business-title" name="solution" placeholder="例：ホストとゲストをマッチングするアプリ"><?= h($_POST['solution'] ?? '') ?></textarea>
- 単純に空白で送るとnullのエラーがついた⇨null合体演算子（Null Coalesce Operator）(**??)
    - ?? の役割:左側が未定義または null の場合、右側の値を返す。フォーム送信データが存在しない場合にデフォルト値を提供。
    - ３つの項目は必須にしたけど、他の項目は任意を外した。solutionとか思いつかないケースある。エラーが出てしまう。 <textarea placeholder="課題を入力してください" rows="4"><?= htmlspecialchars($v["problem"] ?? "") ?></textarea> nullの場合、空白の文字列を返してエラーを防ぐ
- <pre></pre>タグで見やすくする

## ⑥難しかった点・次回トライしたいこと（又は機能）
- AIへの相談機能を実装できればと思ってます
