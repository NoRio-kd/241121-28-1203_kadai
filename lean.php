<html>
<head>
<meta charset="utf-8">
<title>ビジネスモデル質問項目</title>
<link rel="stylesheet" href="./css/lean.css">
</head>
<body>



<!-- ⭐️ -->
<?php
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}
?>

<?php
//💡前回の入力データを取得（三項演算子）ternary operator
//条件が true の場合は ? の後の値を、false の場合は : の後の値を返す。
$customer =     isset($_POST['customer'])   ? $_POST['customer']    : "";
$problem =      isset($_POST['problem'])    ? $_POST['problem']     : "";
$vp =           isset($_POST['vp'])         ? $_POST['vp']          : "";
$solution =     isset($_POST['solution'])   ? $_POST['solution']    : "";
$channel =      isset($_POST['channel'])    ? $_POST['channel']     : "";
$rev =          isset($_POST['rev'])        ? $_POST['rev']         : "";
$cost =         isset($_POST['cost'])       ? $_POST['cost']        : "";
$kpi =          isset($_POST['kpi'])        ? $_POST['kpi']         : "";
$kpi =          isset($_POST['unfair'])     ? $_POST['unfair']      : "";
?>


<h1>あなたのアイディアに関して質問に回答してください</h1>
<!-- ❤️‍🔥必ずformはないとダメ-->
<!-- 💡null合体演算子　変数が未定義または null の場合に代替値を指定する。 -->
<div class="form-container">
    <form action="lean_confirm.php" method="post">
        <div class="form-group">
            <label for="business-title">
                ①誰が抱えている課題を解決しようとしているのか教えてください<br>
            </label>
            <textarea row="3" type="text" id="business-title" name="customer" placeholder="例：（ホスト）家を持っていてお金を稼ぎたい人。（ゲスト）旅行を快適にかつ安価にしたい人" required><?= h($_POST['customer'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ②アイディアが想定する顧客の課題に関する質問です。想定する顧客（人・組織等）が抱えている課題を教えてください
            </label>
            <textarea row="3" type="text" id="business-title" name="problem" placeholder="例: （ホスト）使ってない部屋や空家があり無駄になっている（ゲスト）ホテルがどこも高い" required><?= h($_POST['problem'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ③あなたのアイディア独自の価値提案について教えてください。
            </label>
            <textarea row="3" type="text" id="business-title" name="vp" placeholder="例:（ホスト）自分の持っている家をマネタイズできる。（ゲスト）快適に安価に旅行ができる" required><?= h($_POST['vp'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ④課題に対して検討されている解決策（ソリューション）を教えてください。<br>
                今、想定している顧客は課題に対して現状どのように対処していますか？<br>
                そしてなぜ、その解決策では不十分なのでしょうか？
            </label>
            <textarea type="text" id="business-title" name="solution" placeholder="例：ホストとゲストをマッチングするアプリ"><?= h($_POST['solution'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ⑤顧客へのアプローチは何を通じてしますか？<br>
                （ソリューションの提供方法について教えてください）
            </label>
            <textarea type="text" id="business-title" name="channel" placeholder="例：コミュニティ。Webサイト"><?= h($_POST['channel'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ⑥収益の回収方法について教えてください。
            </label>
            <textarea type="text" id="business-title" name="rev" placeholder="例：（ホスト）ブッキング手数料。（ゲスト）ブッキング手数料"><?= h($_POST['rev'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ⑦コスト構造について教えてください。
            </label>
            <textarea type="text" id="business-title" name="cost" placeholder="例：システム設計費用・運用費・給料・カメラマンへの支払い（ホスト）広告費、コミュニティ運営。（ゲスト）宿泊費用"><?= h($_POST['cost'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ⑧この事業をやった場合、筋の良さを証明するために何を目標にしますか？<br>
                定量的な主要指標(kpi)について教えてください。
            </label>
            <textarea type="text" id="business-title" name="kpi" placeholder="例：取引数、部屋の公開数、予約コンバージョン率"><?= h($_POST['kpi'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="business-title">
                ⑨この事業が成立した場合、簡単に真似したりできない要素はありますか？
                （その要素はお金で解決できないものだとGood!）
            </label>
            <textarea type="text" id="business-title" name="unfair" placeholder="例：ユーザーのフィードバック、スケールメリット"><?= h($_POST['unfair'] ?? '') ?></textarea>
        </div>
        <button type="submit">入力完了</button>
    </form>
</div>


<!-- <ul>
<li><a href="index.php">index.php</a></li>
</ul> -->
</body>
</html>