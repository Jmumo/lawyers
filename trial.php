
<html>
<head>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 h-100" src="photos/1547455519.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 h-100" src="photos/1547455976.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 h-100" src="photos/1547458345.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

      <?php
if( isset($_POST["submit"])){
    $current=$_POST["date"];
    echo $current;
    $time=time();
  $def=$current-$time;
  $now=$def/3600;
  echo $now;
}

?>
<!-- Modal -->

</script>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>