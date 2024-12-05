<?php
//【重要】
ini_set("display_errors", 1);
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("lean_funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM lean_canvas" ;
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
    sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]。fetch allで連想配列で全て取得する。
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/canvas.css">
    <title>データ表示_lean_select</title>
    <!-- <style>
        td{
            padding: 5px;
            background-color: #555;
        }
    </style> -->
</head>
<body>

<!-- ??(null合体演算子)によって空白の文字列の値を設定。定義されていない場合、空白の文字列を返す-->
<table class="canvas-container">
    <?php foreach ($values as $v) { ?>
        <tr class="row">
            <td rowspan="2" class="box problem">
                <div>課題</div>
                <textarea placeholder="課題を入力してください" row="6"><?= htmlspecialchars($v["problem"] ?? "") ?></textarea>
            </td>
            <td class="box solution">
                <div>ソリューション</div>
                <textarea placeholder="ソリューションを入力してください" row="6"><?= htmlspecialchars($v["solution"] ?? "") ?></textarea>
            </td>
            <td rowspan="2" colspan="2" class="box value-proposition">
                <div>独自の価値提案</div>
                <textarea placeholder="独自の価値提案を入力してください" row="8"><?= htmlspecialchars($v["vp"] ?? "") ?></textarea>
            </td>
            <td class="box unfair-advantage">
                <div>圧倒的な優位性</div>
                <textarea placeholder="圧倒的な優位性を入力してください" row="6"><?= htmlspecialchars($v["unfair"] ?? "") ?></textarea>
            </td>
            <td rowspan="2" class="box customer-segment">
                <div>顧客セグメント</div>
                <textarea placeholder="顧客セグメントを入力してください" row="8"><?= htmlspecialchars($v["customer"] ?? "") ?></textarea>
            </td>
        </tr>
        <tr class="row">
            <td class="box key-metrics">
                <div>主要指標</div>
                <textarea placeholder="主要指標を入力してください" row="6"><?= htmlspecialchars($v["kpi"] ?? "") ?></textarea>
            </td>
            <td class="box channel">
                <div>チャネル</div>
                <textarea placeholder="チャネルを入力してください" row="6"><?= htmlspecialchars($v["channel"] ?? "") ?></textarea>
            </td>
        </tr>
        <tr class="row">
            <td colspan="3" class="box cost-structure">
                <div>コスト構造</div>
                <textarea placeholder="コスト構造を入力してください" row="6"><?= htmlspecialchars($v["cost"] ?? "") ?></textarea>
            </td>
            <td colspan="3" class="box revenue-stream">
                <div>収益の流れ</div>
                <textarea placeholder="収益の流れを入力してください" row="6"><?= htmlspecialchars($v["rev"] ?? "") ?></textarea>
            </td>
        </tr>
    <?php } ?>
</table>



<script>
    const data = JSON.parse('<?=$json?>');
    console.log(data);
</script>
</body>
</html>