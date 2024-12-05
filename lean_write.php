<?php

// 受信して値を受け取る⭐️
$customer = $_POST["customer"];
$problem =$_POST["problem"];
$vp=$_POST["vp"];
$solution=$_POST["solution"];
$channel=$_POST["channel"];
$rev=$_POST["rev"];
$cost=$_POST["cost"];
$kpi=$_POST["kpi"];
$unfair=$_POST["unfair"];

$c=",";


//文字作成
// $str = date("Y-m-d H:i:s");
$str .= $customer.$c.$problem.$c.$vp.$c.$solution.$c.$channel.$c.$rev.$c.$cost.$c.$kpi.$c.$unfair.$c; //ここは文字列
// .= はjsでいう+=。

//File書き込み
$file = fopen("data/lean.txt","a");	// ファイル読み込み aは追加書き込み、rは読み込み
fwrite($file, $str."\n");   //(.)は＋と同じ意味で、接続するもの=文字と変数をくっつける
// /nは改行コード。<Br>はブラウザ上だけなので使えない。option+¥=>\
fclose($file);
// ファイルを閉じる

//redirectする⭐️
// header("Location: lean.php"); 
// exit;

?>



<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>


<h1>書き込みしました。</h1>
<h2>./data/lean.txt を確認しましょう！</h2>
<?=$str?>

<ul>
<li><a href="lean.php">戻る</a></li>
</ul>
</body>
</html>