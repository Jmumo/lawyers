<!doctype html>
<html>
<head>
<style>
    *{

    }
    #map{
        width: 80%;
        height: 40%;
    }
</style>
</head>
<body>
<div id="map">

</div>
<script>
    function intmap() {
       var location= {lat:-1.358261,lng:37.950704};
       var map=new google.maps.Map(document.getElementById("map"),{
       zoom: 5,
           center: location
       });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVh4514r3klV5kkbJPx7In0M6snwwhOAE=">

</script>
</body>
</html>