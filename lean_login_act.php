<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値
$lid = $_POST["lid"]; //lid
$lpw = $_POST["lpw"]; //lpw


//1.  DB接続します
include("lean_funcs.php");
$pdo = db_conn();


//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！
$stmt = $pdo->prepare("SELECT * FROM lean_user_table WHERE lid=:lid AND life_flg=0"); //まずはユーザーいますか？だけ尋ねる。ユーザーは１レコードのはずなので一個しか返ってこないはず。
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //🆕lidだけ渡すのがポイント。pwは渡さない⁉️
$status = $stmt->execute();



//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()⇨何個のレコードが返ってきたか確認したい人は。


//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
$pw = password_verify($lpw, $val["lpw"]); 
//⭐️0件だったら取り出せないでfalseになる。$lpw = password_hash($lpw, PASSWORD_DEFAULT);   
//$val["lpw"]パスワードハッシュ化されたものをとってくる。password_verify()がないと時間で変わるpwをキャッチできない
//password_verify()、で引数が合ってるかどうかチェック。true or falseが変える。

if($pw){ 
  //Login成功時(true)
  $_SESSION["chk_ssid"]  = session_id(); //sessionに預けておく
  $_SESSION["kanri_flg"] = $val['kanri_flg']; //管理者フラグ
  // $_SESSION["name"]      = $val['name']; //ログインした時の〜さんこんにちはができるようにつ
  //Login成功時（select.phpへ）
  redirect("lean_select.php");

}else{
  //Login失敗時(login.phpへ)
  redirect("lean_login.php");

}




