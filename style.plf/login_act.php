<?php
session_start();
$u_id = $_POST["lid"];
$u_pw = $_POST["lpw"];

include('functions.php');
//1. 接続します

$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM plf_user_table WHERE u_id=:u_id AND u_pw=:u_pw');
$stmt->bindValue(':u_id', $u_id);
$stmt->bindValue(':u_pw', $u_pw);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["id"]   = $val['id'];
  $_SESSION["u_id"]   = $val['u_id'];
  //Login処理OKの場合select.phpへ遷移
  header("Location: view.php");
}else{
  //Login処理NGの場合login.phpへ遷移
  header("Location: top.php");
}
//処理終了
exit();
?>

