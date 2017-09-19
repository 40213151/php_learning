<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/top.css">
    <link rel="stylesheet" href="css/reset.css">
    <script src="jquery-2.1.3.min.js"></script>
</head>
<body>

<div id="bba">
<div id="bar">
    <p id="log"><a href="login.php">ログイン</a></p>
    <p id="log"><a href="toroku.php">会員登録</a></p>
</div>
</div>

   
<div id="title">
    <p class="keba">卍 ケバいプロフ 卍</p>
    <p class="zibu">自分だけのプロフィールを作ってアピールしよう</p>
</div>
    
       
<div id="sistema">
<h2 id="can">主な機能</h2>
<dl id="sistem">
   
    <dt id="do"><p>プロフィール編集機能</p></dt>
    <dd id="about">
    <p>オリジナルのプロフィールを作成できます。</p>
    <p>世界に一つだけのプロフを作って、みんなに自慢しちゃいましょう!!</p></dd>

    <dt id="do"><p>リアルタイム投稿機能</p></dt>
    <dd id="about">
    <p>あなたの今やっていることや気持ちを、気軽に投稿することができます。</p>
    <p>今の気持ちや思い出を、刻みましょう。</p></dd>
    
    <dt id="do"><p>ゲストブック機能</p></dt>
    <dd id="about"><p>プロフを見て気になった方々が、ここに書き込むことができます。</p>
    <p>新たな出会いが、あなたのことを待っているかもしれません。</p></dd>
    
</dl>

<div id="hazime">
    <p id="start">さあ君も始めよう</p>
    <p id="t"><input type="submit" value="会員登録" class="submit" id="ssss"></p>
</div>

<div id="hazime2">
    <p id="start">会員の方はこちら</p>
    <p id="t"><input type="submit" value="会員画面へ" class="submit"  id="kkkk"></p>
</div>

</div>
<script>
    
 $("#ssss").on("click",function(){
 window.location.href="toroku.php"
        });
 $("#kkkk").on("click",function(){
 window.location.href="login.php"
        });

</script>            
</body>
</html>