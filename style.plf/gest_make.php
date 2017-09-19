<?php
//入力チェック
if(
    !isset($_POST["hn"]) || $_POST["hn"]=="" ||
    !isset($_POST["naiyou"]) || $_POST["naiyou"]=="" ||
){
    exit('ParamError');
}


//1. POSTデータ取得
$hn  =$_POST["hn"];
$naiyo =$_POST["naiyou"];



//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=daimaru-6718_sakura;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql="INSERT INTO plf_gest_table ( id, hn, naiyou, indate )  VALUES( NULL, :a1, :a2, :a3, sysdate())";

$stmt = $pdo->prepare($sql);jj

$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);  
$stmt->bindValue(':a3', $coment, PDO::PARAM_STR); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: gest.php");
  exit;

}
?>
