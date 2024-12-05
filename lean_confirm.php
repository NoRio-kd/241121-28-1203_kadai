<?php

$customer = $_POST['customer'];
$problem = $_POST['problem'];
$vp = $_POST['vp'];
$solution = $_POST['solution'];
$channel = $_POST['channel'];
$rev = $_POST['rev'];
$cost = $_POST['cost'];
$kpi = $_POST['kpi'];
$unfair = $_POST['unfair'];



echo "<pre>"; // 整形表示のために <pre> タグを開く

// $customer を表示（配列またはオブジェクトの場合）
// if (isset($customer)) {
//     print_r($customer); 
// } else {
//     echo "Customer data is not set.\n";
// }
// 変数を表示
echo isset($customer)   ? $customer     . "\n" : "Customer is not set   .\n";
echo isset($problem)    ? $problem      . "\n" : "Problem is not set    .\n";
echo isset($vp)         ? $vp           . "\n" : "VP is not set         .\n";
echo isset($solution)   ? $solution     . "\n" : "Solution is not set   .\n";
echo isset($channel)    ? $channel      . "\n" : "Channel is not set    .\n";
echo isset($rev)        ? $rev          . "\n" : "Revenue is not set    .\n";
echo isset($cost)       ? $cost         . "\n" : "Cost is not set       .\n";
echo isset($kpi)        ? $kpi          . "\n" : "KPI is not set        .\n";
echo isset($rev)        ? $rev          . "\n" : "unfair ad is not set  .\n";

echo "</pre>"; // 整形表示を終了


//  重要な三つだけrequiredを設置
//  htmlにrequiredがあるから意味なし😭
if($customer ==""){
    $customer = "<p style = 'color:red;'>未入力</p>";
}
if($problem== ""){
    $problem = "<p style = 'color:red;'>未入力</p>";
}
if($vp==""){
    $vp = "<p style = 'color:red;'>未入力</p>";
}
if($solution==""){
    $solution = "<p style = 'color:green;'>未入力</p>";
}
if($channel==""){
    $channel = "<p style = 'color:green;'>未入力</p>";
}
if($rev==""){
    $rev = "<p style = 'color:green;'>未入力</p>";
}
if($cost==""){
    $cost = "<p style = 'color:green;'>未入力</p>";
}
if($kpi==""){
    $kpi = "<p style = 'color:green;'>未入力</p>";
}
if($unfair==""){
    $unfair = "<p style = 'color:green;'>未入力</p>";
}



?>

<html>
<head>
<meta charset="utf-8">
<title>lean（受信）</title>
</head>
<body>
<h1>確認画面</h1>

<pre>
customer segment: <?=$customer?>
customer problem: <?=$problem?>
Value Proposition: <?=$vp?>
solution: <?=$solution?>
channel: <?=$channel?>
rev: <?=$rev?>
cost: <?=$cost?>
kpi: <?=$kpi?>
unfair: <?=$unfair?>
</pre>

<form action="lean_insert.php" method="post">
    <!-- 確定ボタン -->
    <input type="hidden" name="customer"    value="<?=$customer?>">
    <input type="hidden" name="problem"     value="<?=$problem?>">
    <input type="hidden" name="vp"          value="<?=$vp?>">
    <input type="hidden" name="solution"    value="<?=$solution?>">
    <input type="hidden" name="channel"     value="<?=$channel?>">
    <input type="hidden" name="rev"         value="<?=$rev?>">
    <input type="hidden" name="cost"        value="<?=$cost?>">
    <input type="hidden" name="kpi"         value="<?=$kpi?>">
    <input type="hidden" name="unfair"      value="<?=$unfair?>">
    <button type="submit">入力内容を確定する</button>
</form>
<form action="lean.php" method="post">
    <!-- 元に戻るボタン -->
    <input type="hidden" name="customer"    value="<?=$customer?>">
    <input type="hidden" name="problem"     value="<?=$problem?>">
    <input type="hidden" name="vp"          value="<?=$vp?>">
    <input type="hidden" name="solution"    value="<?=$solution?>">
    <input type="hidden" name="channel"     value="<?=$channel?>">
    <input type="hidden" name="rev"         value="<?=$rev?>">
    <input type="hidden" name="cost"        value="<?=$cost?>">
    <input type="hidden" name="kpi"         value="<?=$kpi?>">
    <input type="hidden" name="unfair"      value="<?=$unfair?>">
    <button type="submit">入力画面で修正する</button>
</form>
<ul>
<li><a href="lean.php">lean.php</a></li>
</ul>
</body>
</html>