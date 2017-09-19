<?php
$id =$_POST["id"];
$hn =$_POST["hn"];
$gaku =$_POST["gaku"];
$from= $_POST["from"];
$ziman =$_POST["ziman"];
$type =$_POST["type"];
$zense =$_POST["zense"];
$syutyo =$_POST["syutyo"];
$yume =$_POST["yume"];
$real =$_POST["real"];
$gest =$_POST["gest"];
$link =$_POST["link"];
    
////DB接続
try {
  $pdo = new PDO('mysql:dbname=daimaru-6718_sakura;charset=utf8;host=mysql612.db.sakura.ne.jp','daimaru-6718','5kdo5yys');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした'.$e->getMessage());
}


////UPDATE
$sql = 'UPDATE plf_about_table SET `hn`=:hn,`gaku`=:gaku,`from`=:from,`ziman`=:ziman,`type`=:type,`zense`=:zense,`syutyo`=:syutyo,`yume`=:yume,`real`=:real,`gest`=:gest,`link`=:link WHERE `id`=:id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':hn',$hn, PDO::PARAM_STR);
$stmt->bindValue(':gaku',$gaku, PDO::PARAM_STR);
$stmt->bindValue(':from',$from, PDO::PARAM_STR);
$stmt->bindValue(':ziman',$ziman, PDO::PARAM_STR);
$stmt->bindValue(':type',$type, PDO::PARAM_STR);
$stmt->bindValue(':zense',$zense, PDO::PARAM_STR);
$stmt->bindValue(':syutyo',$syutyo, PDO::PARAM_STR);
$stmt->bindValue(':yume',$yume, PDO::PARAM_STR);
$stmt->bindValue(':real',$real, PDO::PARAM_STR);
$stmt->bindValue(':gest',$gest, PDO::PARAM_STR);
$stmt->bindValue(':link',$link, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);

$status = $stmt->execute();





////登録処理がおわった後
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLエラー:".$error[2]);

}else{
  header("location: select.php");
}
?>
