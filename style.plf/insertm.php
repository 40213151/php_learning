<?php
session_start();

//入力チェック
if(
    !isset($_POST["hn"]) || $_POST["hn"]=="" ||
    !isset($_POST["gaku"]) || $_POST["gaku"]=="" ||
    !isset($_POST["from"]) || $_POST["from"]=="" ||
    !isset($_POST["ziman"]) || $_POST["ziman"]=="" ||
    !isset($_POST["type"]) || $_POST["type"]=="" ||
    !isset($_POST["zense"]) || $_POST["zense"]=="" ||
    !isset($_POST["syutyo"]) || $_POST["syutyo"]=="" ||
    !isset($_POST["yume"]) || $_POST["yume"]=="" ||
    !isset($_POST["real"]) || $_POST["real"]=="" ||
    !isset($_POST["gest"]) || $_POST["gest"]=="" ||
    !isset($_POST["link"]) || $_POST["link"]==""
){
    exit('ParamError');
}


//1. POSTデータ取得
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

//画像

//if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){
//    
//    //***File名の変更***
//    $file_name = $_FILES["photo"]["firstname"]; //"1.jpg"ファイル名取得
//    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
//    $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
//    //2. アップロード先とファイル名を作成
//    $upload_file = "./upload/".$uniq_name; //ユニークファイル名とパス
//    
//    // アップロードしたファイルを指定のパスへ移動
//    //例）move_uploaded_file("一時保存場所","成功後に正しい場所に移動");
//    if (move_uploaded_file($_FILES["photo"]['tmp_name'],$upload_file)){
//        
//        //パーミッションを変更（ファイルの読み込み権限を付けてあげる）
//        chmod($upload_file,0644);
//        
//        //アップロード成功したら文字と画像を表示
//        echo 'アップロード成功';
//        echo '<img src="'.$upload_file.'">';
//        
//    }else{
//        echo "fileuploadOK...Failed";
//    }
//}else{
//    echo "fileupload失敗";
//}


//2. DB接続します
 try {
  $pdo = new PDO('mysql:dbname=daimaru-6718_sakura;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql=
"INSERT INTO plf_about_table ( `id`, `hn`, `gaku`, `from`, `ziman`, `type`, `zense`, `syutyo`, `yume`, `real`, `gest`, `link`, `indate` )  
VALUES( NULL, :1, :2, :3, :4, :5, :6, :7, :8, :9, :10, :11, sysdate()) ";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':1', $hn, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':2', $gaku, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':3', $from, PDO::PARAM_STR);  //Integer（数値の場 PDO::PARAM_INT)
$stmt->bindValue(':4', $ziman, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':5', $type, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':6', $zense, PDO::PARAM_STR);  //Integer（数値の場 PDO::PARAM_INT)
$stmt->bindValue(':7', $syutyo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':8', $yume, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':9', $real, PDO::PARAM_STR);  //Integer（数値の場 PDO::PARAM_INT)
$stmt->bindValue(':10', $gest, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':11', $link, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  $_SESSION["insert_ssid"]  = session_id();
  header("Location:view.php");
  exit;

}
?>
