  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/toroku.css">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>
  
<div id="sitetitle">
   <div id="sitetitle2">
    <h1>会員登録画面</h1>
    <h2>俺は会員登録マン</h2>
    </div>
</div>
      
      
<div id="text">
<form method="post"action="insert.php">
    
    <ul id="form-list">
        <dl id="form-item">
            <dt for="namae" class="form-label">名前</dt>
            <dd class="form-detail">
                <input type="text" name="u_name" class="form-parts">
            </dd>
        </dl>
        
        <dl id="form-item">
            <dt for="add" class="form-label">id</dt>
            <dd class="form-detail">
                <input type="text"name="u_id"class="form-parts">
            </dd>
        </dl>
        
        <dl id="form-item">
            <dt for="iki" class="form-label">パスワード</dt>
            <dd class="form-detail">
                <input type="password" name="u_pw" class="form-parts">
            </dd>
        </dl>
    </ul>
        
<p id="t"><input type="submit" value="登録" class="submit"></p>

</form>
</div>
       <a href="top.php">戻る</a>

</body>
</html>