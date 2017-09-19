<?php
session_start();
include("functions.php");

//入力チェック
if(
    !isset($_POST["u_name"]) || $_POST["u_name"]=="" ||
    !isset($_POST["u_id"]) || $_POST["u_id"]=="" ||
    !isset($_POST["u_pw"]) || $_POST["u_pw"]==""
){
    exit('ParamError');
}


//1. POSTデータ取得
$u_name  =$_POST["u_name"];
$u_id =$_POST["u_id"];
$u_pw =$_POST["u_pw"];



//2. DB接続します
$pdo = db_con();


//３．データ登録SQL作成
$sql=
"INSERT INTO plf_user_table ( id, u_name, u_id, u_pw, indate, life_flg )  
VALUES( NULL, :a1, :a2, :a3, sysdate(), 0) ";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $u_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $u_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $u_pw, PDO::PARAM_STR);  //Integer（数値の場 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  queryError($stmt);

}else{
    $stmt2 = $pdo->prepare('SELECT * FROM plf_user_table WHERE u_id=:u_id AND u_pw=:u_pw');
    $stmt2->bindValue(':u_id', $u_id);
    $stmt2->bindValue(':u_pw', $u_pw);
    $res = $stmt2->execute();
    
    //3. SQL実行時にエラーがある場合
    if($res==false){
      querryError($stmt);
    }
    
    //4. 抽出データ数を取得
    //$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
    $val = $stmt2->fetch(); //1レコードだけ取得する方法
    
    //5. 該当レコードがあればSESSIONに値を代入
    if( $val["id"] != "" ){
        
      $_SESSION["chk_ssid"]  = session_id();
      // $_SESSION["kanri_flg"] = $val['kanri_flg'];
      $_SESSION["id"]   = $val['id'];
      $_SESSION["u_id"]   = $val['u_id'];
      header("Location: make.php");
    }else{
      //logout処理を経由して全画面へ
        header("Location: top.php");
    }
    exit();
}
  exit();
?>

