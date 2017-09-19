<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ケバいプロフ</title>
    <link rel="stylesheet" href="css/plf.css">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>


<?php
session_start();
include('functions.php');
chkSSID();
    
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
}else{
  header("Location: top.php");
};

$pdo = db_con();

//データ登録SQL作成
$sql = "SELECT * FROM plf_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//$u_name="";
//$u_id="";
//$indate="";


if($status==false){
  queryError($stmt);
}else{
    $result = $stmt->fetch();
    $u_name = $result["u_name"];
    $u_id = $result["u_id"];
    $indate = $result["indate"];
};

$stmt2 = $pdo->prepare("SELECT * FROM plf_about_table WHERE id=:id");
$stmt2->bindValue(":id",$id,PDO::PARAM_INT);
$status2 = $stmt2->execute();
    
//$hn="";
//$gaku="";
//$from="";
//$ziman="";
//$type="";
//$zense="";
//$syutyo="";
//$yume="";
//$real="";
//$gest="";
//$link="";

if($status2==false){
  queryError($stmt2);
}else{
    $result2 = $stmt2->fetch();
    $age = $result2["age"];
    $hn = $result2["hn"];
    $gaku = $result2["gaku"];
    $from = $result2["from"];
    $ziman = $result2["ziman"];
    $type = $result2["type"];
    $zense = $result2["zense"];
    $syutyo = $result2["syutyo"];
    $yume = $result2["yume"];
    $real = $result2["real"];
    $gest = $result2["gest"];
    $link = $result2["link"];

};
    
?>

<div id="all">   

   <p id="date">最新投稿<?=$indate?></p>
   <br>
   
   <div id="mdl">
   
   <p id="title"><?=$u_id?></p>
    
    <div id="photo"></div>
    
    <dl id="yoko">
        <dt id="ques"><p>[HN]</p></dt>
        <dd id="ans"><p><?=$hn?></p></dd>

        <dt id="ques"><p>[学年]</p></dt>
        <dd id="ans"><p><?=$gaku?></p></dd>
        
        <dt id="ques"><p>[住んでるとこ]</dt>
        <dd id="ans"><p><?=$from?></p></dd>

        <dt id="ques"><p>[自慢なところ]</p></dt>
        <dd id="ans"><p><?=$ziman?></p></dd>

        <dt id="ques"><p>[好きなタイプ]</p></dt>
        <dd id="ans"><p><?=$type?></p></dd>
        
        <dt id="ques"><p>[前世]</p></dt>
        <dd id="ans"><p><?=$zense?></p></dd>
        
        <dt id="ques"><p>[兎に角主張したいこと]</p></dt>
        <dd id="ans"><p><?=$syutyo?></p></dd>

        <dt id="ques"><p>[彼女、彼氏と何年続いてる？]</p></dt>
        <dd id="ans"><p><?=$yume?></p></dd>

        <dt id="ques"><p>[リアル]</p></dt>
        <dd id="ans"><p><?=$real?></p></dd>

        <dt id="ques"><p>[ゲストルーム]</p></dt>
        <dd id="ans"><a href="gest.php"><p>
        <?=$gest?></p></a></dd>

        <dt id="ques"><p>[link]</p></dt>
        <dd id="ans"><p><?=$link?></p></dd>
    </dl>
    </div>
    
    
    <dvi id="back">
<a href="logout.php" id="back"><p>ログアウチ</p></a>
<a href="hensyu.php" id="back"><p>プロフの変更</p></a>
    </dvi>
</div>
</body>
</html>