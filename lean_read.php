<!-- NEW 11201300-->

<?php
// ファイルを変数に格納
$filename = 'data/lean.txt';
$fp = fopen($filename, 'r');

 // whileで行末までループ処理
$arr = [];
while (!feof($fp)) {
    // fgetsでファイルを読み込み、変数に格納
    $txt = fgets($fp);
    $txt = str_replace("\n", "\\n", $txt);    // 各行のデータを処理する際に改行文字をエスケープ 
    //空だったら
    if($txt!=""){
        $arr[] = explode(",", $txt);
        
    }
}
fclose($fp);// fcloseでファイルを閉じる

//JavaScriptようにJSONに変換！！
$json = json_encode($arr,JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/canvas.css">
    <title>lean_read</title>
    <!-- <style>
        td{
            padding: 5px;
            background-color: #555;
        }
        
    </style> -->
</head>
<body>
    


<?php 

for($i=0; $i<count($arr);$i++){ ?>
<table class="canvas-container">
            <tr class="row">
                <td rowspan="2" class="box problem">
                    <div>課題</div>
                    <textarea placeholder="課題を入力してください" rows="4"><?=$arr[$i][1]?></textarea>
                </td>
                <td class="box solution">
                    <div>ソリューション</div>
                    <textarea placeholder="ソリューションを入力してください" rows="4"><?=$arr[$i][3]?></textarea>
                </td>
                <td rowspan="2" colspan="2" class="box value-proposition">
                    <div>独自の価値提案</div>
                    <textarea placeholder="独自の価値提案を入力してください" rows="8"><?=$arr[$i][2]?></textarea>
                </td>
                <td class="box unfair-advantage">
                    <div>圧倒的な優位性</div>
                    <textarea placeholder="圧倒的な優位性を入力してください" rows="4"><?=$arr[$i][8]?></textarea>
                </td>
                <td rowspan="2" class="box customer-segment">
                    <div>顧客セグメント</div>
                    <textarea placeholder="顧客セグメントを入力してください" rows="8"><?=$arr[$i][0]?></textarea>
                </td>
            </tr>
            <tr class="row">
                <td class="box key-metrics">
                    <div>主要指標</div>
                    <textarea placeholder="主要指標を入力してください" rows="4"><?=$arr[$i][7]?></textarea>
                </td>
                <td class="box channel">
                    <div>チャネル</div>
                    <textarea placeholder="チャネルを入力してください" rows="4"><?=$arr[$i][4]?></textarea>
                </td>
            </tr>
            <tr class="row">
                <td colspan="3" class="box cost-structure">
                    <div>コスト構造</div>
                    <textarea placeholder="コスト構造を入力してください" rows="4"><?=$arr[$i][6]?></textarea>
                </td>
                <td colspan="3" class="box revenue-stream">
                    <div>収益の流れ</div>
                    <textarea placeholder="収益の流れを入力してください" rows="4"><?=$arr[$i][5]?></textarea>
                </td>
            </tr>
            </table>
<?php } ?>


<script>
    const data = JSON.parse('<?=$json?>');
    console.log(data);
</script>
</body>
</html>