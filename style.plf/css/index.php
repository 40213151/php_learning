<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/var.js"></script>
</head>
<body>


    <?php
    $subject=array('とても面白かった','面白かった','普通','つまらなかった','とてもつまらなかった');
for($i=0; $i<count($subject); $i++){
    echo "<input type='radio' name='kanso' value='$i'>{$subject[$i]}<br>\n";
}
        ?>
    
    <input type="submit" name="submit" value="送信">


<div id="all">


<!--   map-->
    <div id="mapatsugi"></div>
<!--    text-->
<div id="text">
       
    <div id="toha">
            <div id="img">
                <p id="gazo" name="change"></p>
            </div>
            <div id="title">
                <p id="namae" name="change">あばばばば</p>
                <h2>住所</h2>
                <p id="zyusyo" name="change">あばばばっば</p>
                <h2>電話番号</h2>
                <p id="tell" name="change">080-5050-6756</p>
            </div>
    </div>
       
    <div id="setsumei">
            <p id="bun" name="change">あああ</p>
    </div>
        
        
        
</div>

    
<script>

var map;
var marker = [];
var infoWindow = [];

function initMap() {
 // 地図の作成
    var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
    map = new google.maps.Map(document.getElementById('mapatsugi'), { // #sampleに地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: 14 // 地図のズームを指定
   });
 
 // マーカー毎の処理
 for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
            position: markerLatLng, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
       });
 
     infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content: '<div class="sample">' + markerData[i]['name'] + '</div>'
                });
     markerEvent(i); // マーカーにクリックイベントを追加
 }
}
 
// マーカーにクリックイベントを追加
    
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
    infoWindow[i].open(map, marker[i]); // 吹き出しの表示
    });
    
    marker[i].addListener('click',function() {
    $("#gazo").html(htmlData[i][0]);
    $("#namae").html(htmlData[i][1]);
    $("#zyusyo").html(htmlData[i][2]);
    $("#tell").html(htmlData[i][3]);
    $("#bun").html(htmlData[i][4]);
    });
}

    
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsOpBA4okFfAdVh3zltZvskpNwC3Rh6BI
    &callback=initMap"
    async defer></script>
    
    
</body>
</html>