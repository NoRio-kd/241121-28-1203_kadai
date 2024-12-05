<?php

//1. POSTデータ取得受信して値を受け取る⭐️
$customer = $_POST["customer"];
$problem =$_POST["problem"];
$vp=$_POST["vp"];
$solution=$_POST["solution"];
$channel=$_POST["channel"];
$rev=$_POST["rev"];
$cost=$_POST["cost"];
$kpi=$_POST["kpi"];
$unfair=$_POST["unfair"];
// $c=",";

//データ飛んでるか確認
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;


//2. DB接続します

include("lean_funcs.php");
$pdo = db_conn();

// var_dump($customer, $problem, $vp, $solution, $channel, $rev, $cost, $kpi, $unfair);
// exit;

//３．データ登録SQL作成 ※カラム名と一致しないとダメ
try {
$stmt = $pdo->prepare("INSERT INTO lean_canvas(customer,problem,vp,solution,channel,rev,cost,kpi,unfair,indate)VALUES(:customer,:problem,:vp,:solution,:channel,:rev,:cost,:kpi,:unfair,sysdate())");
$stmt->bindValue(':customer',   $customer,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':problem',    $problem,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':vp',         $vp,            PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':solution',   $solution,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':channel',    $channel,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rev',        $rev,           PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cost',       $cost,          PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kpi',        $kpi,           PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':unfair',     $unfair,        PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行
echo "データが正常に挿入されました！";
} catch (PDOException $e) {
    echo "エラー: " . $e->getMessage();
}


// 実行結果の確認
if ($status) {
    echo "データが正常に登録されました。";
} else {
    echo "データ登録中にエラーが発生しました。";
}


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    function sql_error($stmt){
        $error= $stmt->errorInfo();

    exit("SQLError:".$error[2]);
    }
}else{
    //*** function化する！*****************
    redirect("lean_select.php");
    //データ書き込みならwriteだけどリダイレクトはリーンキャンバスページに行くべき

}