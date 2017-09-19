<?php
session_start();
include('functions.php');
chkSSID();

if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
}else{
  header("Location: top.php");
};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/make.css">
    <link rel="stylesheet" href="css/reset.css">
    <script src="jquery-2.1.3.min.js"></script>
</head>
<body>
  
<div id="sitetitle">
   <div id="sitetitle2">
    <h1>会員登録成功！！</h1>
    <h2>素晴らしい！！次はプロフを作ろう</h2>
    </div>
</div>
      
<div id="text">
 
<form method="post" action="insertm.php">  
 
  <ul id="form-list">
   <dl id="form-item">
            <dt for="hn" class="form-label">ニックネーム</dt>
            <dd class="form-detail">
                <input type="text" name="hn" class="form-parts">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="gaku" class="form-label">学年</dt>
            <dd class="form-detail">
                <input type="text"name="gaku"class="form-parts">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="from" class="form-label">住んでるとこ</dt>
            <dd class="form-detail">
                <input type="text" name="from" class="form-parts">
            </dd>
        </dl>

    <dl id="form-item">
            <dt for="ziman" class="form-label">自慢なところ</dt>
            <dd class="form-detail">
                <input type="text" name="ziman" class="form-parts">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="type" class="form-label">好きなタイプ</dt>
            <dd class="form-detail">
                <input type="text"name="type"class="form-parts">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="zense" class="form-label">前世</dt>
            <dd class="form-detail">
                <input type="text" name="zense" class="form-parts">
            </dd>
        </dl>

    <dl id="form-item">
            <dt for="syutyo" class="form-label">兎に角主張したいこと</dt>
            <dd class="form-detail">
                <input type="text" name="syutyo" class="form-parts">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="yume" class="form-label">彼女、彼氏と何年続いてる？</dt>
            <dd class="form-detail">
                <input type="text"name="yume"class="form-parts">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="real" class="form-label">リアル</dt>
            <dd class="form-detail">
                <input type="text" name="real" class="form-parts">
            </dd>
        </dl>

    <dl id="form-item">
            <dt for="gest" class="form-label">ゲストルーム</dt>
            <dd class="form-detail">
                <input type="text" name="gest" class="form-parts">
            </dd>
        </dl>
        
    <dl id="form-item">
            <dt for="link" class="form-label">link</dt>
            <dd class="form-detail">
                <input type="text"name="link"class="form-parts">
            </dd>
        </dl>

</ul>
        
<p id="t"><input type="submit" value="登録" class="submit"></p>

</form>
</div>
       <a href="top.php">戻る</a>
</body>
</html>