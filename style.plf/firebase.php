<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<!--    コンテンツ画面-->
<div class="all">
    <div id="name">名前<input type="text" id="username"></div>
    <p id="today"></p>
    <div class="tb">
        <textarea id="text" rows="5"></textarea>
        <button id="send">送信</button>
    </div>
<!--    リスト表示-->
    <div id="output"></div>
</div>
<!--コンテンツ画面-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
<script>
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
                username: $("#username").val(),
                today: $("#today").val(),
                text: $("#text").val()
                  })
        ;
            $("#text").val("");
    });
    
    
    //データ受信
    
    newPostRef.on("child_added",function(data ){
        var v=data.val(); //データ所得
        var k=data.key; //キー所得
        
        //メッセージ作成
        var str='<ul id="'+k+'" style="list-style:none;"><li>'+v.username+'</li><li>'+v.today+'</li><li>'+v.text+'</li></ul>';
        $("#output").prepend(str);
        
    });

    
</script>    
</body>

</html>