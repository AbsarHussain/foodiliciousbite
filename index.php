<?php
session_start();
?>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Foodiliciousbite</title>


</head>
<body onload="showPosition()">
<script>
    function showPosition() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                window.location='products.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
                
                

                
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
</script>
<?php
include('config.php');


echo "If You Are Not Redirected in </br> Couple of Seconds Please Allow </br> App Location Access "
?>
    <div id="result">
        <!--Position information will be inserted here-->
    </div>
    <button type="button" onclick="showPosition();" hidden>Show Position</button>

    <script>
var p1 = "success";
</script>


    
</body>
</html>