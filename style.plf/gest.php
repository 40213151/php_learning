<?php
//1.  DB接続します
//try {
//  $pdo = new PDO('mysql:dbname=daimaru-6718_sakura;charset=utf8;host=localhost','root','');
//} catch (PDOException $e) {
//  exit('DbConnectError:'.$e->getMessage());
//}
//
////２．データ登録SQL作成
//$stmt = $pdo->prepare("SELECT * FROM plf_gest_table");
//$status = $stmt->execute();
//
////３．データ表示
//
//if($status==false){
//  //execute（SQL実行時にエラーがある場合）
//  $error = $stmt->errorInfo();
//  exit("SQLエラー:".$error[2]);
//
//}else{
//  //Selectデータの数だけ自動でループしてくれる
//  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//   $row = $stmt->fetch();
//  }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../style.plf/css/gest.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <a href="view.php"><p id="back">戻る</p></a>
    <br>  
<div class="container">
<div id="gest">
    
    
    <div id="title">
        <h1 id="gestroom">卍 ゲストルーム 卍</h1>
        
        <div id="mana">
            <h2 id="mamo">最低限のマナーは守りましょう</h2>
            
            <div id="manas">
            <p>1: 誹謗中傷はやめましょう</p>
            <p>2: 出会い目的の書き込みはやめましょう</p>
            <p>3: 個人情報の流出には気をつけましょう</p>
            </div>
            <p id="today"></p>
            
        </div>  
    </div>

    <div id="forms">
    <form action="" method="post">
        
    <ul id="form-list">
   <dl id="form-item1">
            <dt for="name" class="form-label1"><p id="nama">お名前:</p></dt>
            <dd class="form-detail">
                <input type="text" name="hn" class="form-parts1" id="mae" style=" height: 2rem;">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="gaku" class="form-label"><p id="naiyo">投稿内容:</p></dt>
            <dd class="form-detail">
                <textarea name="naiyou" rows="8" cols="80" id="nainai"></textarea>
            </dd>
        </dl>
    </ul>
    <p id="t"><input type="submit" value="投稿" class="submit" id="send"></p>
    </form>
    </div>

    <div id="output" class="text" style=" width:100%;
    padding-top: 2rem;
    padding-bottom: 1rem;
    padding-left: 3rem;">
        <div class="panel panel-primary"> 
        <div class="panel-heading head"> 
        <p class="tat">[0] お知らせ</p> 
        </div> <div class="panel-body body">
            <p class="bobo">こんにちは</p>
            <p class="date pull-right">
            </p>
            </div> 
        </div>
        
        
    </div>                   
            
<!--<div id="output"></div>      -->
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
<script>
    
//日にちの取得
    $(function(){
  var now = new Date();
  var y = now.getFullYear();
  var m = now.getMonth() + 1;
  var d = now.getDate();
  var w = now.getDay();
  var wd = ["日", "月", "火", "水", "木", "金", "土"];
  var h = now.getHours();
  var mi = now.getMinutes();
  var s = now.getSeconds();
	$("#today").text(y + "年" + m + "月" + d + "日" + h + "時" + mi + "分" + s + "秒" + "(" + wd[w] + ")");
});
    
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAPYWoVnK4MAmaWgKwu26nJ03rzPJA6-lY",
    authDomain: "gestroom-4af15.firebaseapp.com",
    databaseURL: "https://gestroom-4af15.firebaseio.com",
    projectId: "gestroom-4af15",
    storageBucket: "gestroom-4af15.appspot.com",
    messagingSenderId: "925433648631"
  };
  firebase.initializeApp(config);
    
    //メッセージ送信準備
    var newPostRef= firebase.database().ref();
    
    
    
    //メッセージ送信
    $("#send").on("click",function(){
            newPostRef.push({
                mae: $("#mae").val(),
                today: $("#today").val(),
                nainai: $("#nainai").val()               });
            $("#text").val("");
    });
    
    
    //データ受信
    
    newPostRef.on("child_added",function(data){
        var v=data.val(); //データ所得
        var k=data.key; //キー所得
        
    //メッセージ作成
//        var str='<ul id="'+k+'" style="list-style:none;"><li>'+v.mae+'</li><li>'+v.nainai+'</li></ul>';
//        $("#output").prepend(str);
        
        var str ='<div id="'+k+'" class="panel panel-primary" > <div class="panel-heading head"> <p class="tat">[0] '+v.mae+'</p> </div> <div class="panel-body body"><p class="bobo">'+v.nainai+'</p><p id="today">'+v.today+'</p></div></div>';
        $("#output").prepend(str);
        
        
    });

    
</script>    

</body>
</html>