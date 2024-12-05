<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
//*** function化する！  *****************
function db_conn(){    

    // // 作業用👷🚨🚨🚨🚨🚨🚨🚨🚨🚨
        try {
            $db_name = "gs_db";    //データベース名（一番上の階層）
            $db_id   = "root";      //アカウント名
            $db_pw   = "";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
            $db_host = "localhost"; //DBホスト
            return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
        } catch (PDOException $e) {
            exit('DB Connection Error:'.$e->getMessage());
        }

    
        // try {
        //     $db_name = "norikikadowaki_unit2";    //データベース名（一番上の階層）
        //     $db_id   = "norikikadowaki_unit2";      //アカウント名
        //     $db_pw   = "kadai_1128";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
        //     $db_host = "mysql80.norikikadowaki.sakura.ne.jp"; //DBホスト
        //     return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
        // } catch (PDOException $e) {
        //     exit('DB Connection Error:'.$e->getMessage());
        // }
        
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}



//リダイレクト関数: redirect($file_name)

function redirect($file_name){
    header("Location: ".$file_name );
    exit();
}



//SessionCheck()
function sschk(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){ 
      //session_id()でidを取得する
      //!あるので、セットされてなければ、[前のページのログイン通ってる？] or 前のページで預けたのとこのページのやつ一緒？？
      //login_actで生成されたやつ
        exit("Login Error");
    }else{  //うまくいっていたらelseに飛ぶ
        session_regenerate_id(true);  //session hijack対策で、違うsession idで開いてるやつを取ってきて、session idを変更してくれる。ここのtrueがなくなるとファイルが複数に増えてやばい。
        $_SESSION["chk_ssid"] = session_id();
    }
}
