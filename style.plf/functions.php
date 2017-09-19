<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//DB接続関数（PDO）
function db_con(){
      $dbname='daimaru-6718_sakura';

  try {
//      ローカル
    $pdo = new PDO('mysql:dbname=daimaru-6718_sakura;charset=utf8;host=localhost','root','');
      // 本番

  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function queryError($stmt){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


/**
* XSS
* @Param:
* @Return:
*/

function chkSSID(){
    if(
        !isset($_SESSION["chk_ssid"]) ||
        $_SESSION["chk_ssid"]!=session_id()
    ){
        header('Location: top.php');
        exit;
    }else{
        session_regenerate_id(true);

        //新しいセッションIDを取得
        $_SESSION["chk_ssid"] = session_id();
    }
}

?>

