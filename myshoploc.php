<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Foodiliciousbite</title>
<script>
    function showPosition() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                window.location='myshops.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                document.getElementById("result").innerHTML = positionInfo;

                
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
</script>

</head>
<body onload="showPosition()">
<script>
    function showPosition() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                window.location='myshops.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
                
                

                
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
</script>
<?php
echo "<script>document.writeln(positionInfo);</script>";
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