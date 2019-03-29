<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
if(!isset($_SESSION["user"])){
    redirect_to("login.php");
}
?>
<html>
<head>
    <script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler ml-auto bg-light" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <div class="container-fluid">
            <div class="row">
                <!--                side bar-->
                <div class="col-md-3 sidebar fixed-top">
                    <a href="#" class="navbar-brand text-info d-block mx-auto text-center links">Dashboard</a>
                    <div>
                        <ul class="navbar-nav flex-column mt-1">
                            <li class=" text-center mb-2"></i>
                                <a href="home.admin.php" class="text-white text-center nav-link ">manage workers</a>
                            </li>
                            <li class="sidebar-link text-center mb-2">
                                <a href="admin.news.php" class="text-white text-center nav-link ">manage news</a>
                            </li>
                            <li class="sidebar-link text-center mb-2">
                                <a href="lawyers.news.php" class="text-white text-center nav-link">post lawyers news</a>
                            </li>
                            <li class="sidebar-link text-center mb-2">
                                <a href="admins.php" class="text-white text-center nav-link ">manage admins</a>
                            </li>
                            <li class="sidebar-link text-center mb-2">
                                <a href="admin.expertise.php" class="text-white text-center nav-link">manage
                                    expertise</a>
                            </li>
                            <li class="current sidebar-link text-center mb-2">
                                <a href="manageaccess.php" class="text-white text-center nav-link">manage
                                    access</a>
                            </li>
                            <li class=" sidebar-link text-center mb-2">
                                <a href="cases.php" class="text-white text-center nav-link">
                                    cases</a>
                            </li>
                            <li class="sidebar-link text-center mb-2">
                                <a href="index.php" class="text-white text-center nav-link">log out</a>
                            </li>

                        </ul>
                    </div>

                </div>

                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details " style=" height: 100%">


                    <div class="container pre-scrollable col-lg-12">
                        <div class=" mx-0 h-50">

                            <table class="table table-hover table-striped ">
                                <thead class="thead-dark  ">
                                <tr>

                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>control</th>

                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("sign");
                                foreach ($fetched as $row) {
                                    $id = $row[0];
                                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                     <td>$row[3]</td>
                      <td><a href='deleteaccess.php?id={$id};'> <button class='btn-sm btn-danger mr-3' name='id'>delete</button></a>
                       <a href='approve.php?id={$id};'> <button class='btn-sm btn-danger mr-4' name='id'>approve</button></a>
                      
                     
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="bg-dark">
                    <button class="btn-danger btn-block"></button>
                    <hr>
                    <div class="container pre-scrollable col-lg-12">
                        <div class=" mx-0 h-50">
                            <table class="table table-hover table-striped ">
                                <h2 class="text-center text-capitalize text-info ">approved accounts</h2>
                                <thead class="thead-dark  ">
                                <div><?php echo success(); ?></div>
                                <tr>

                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>control</th>

                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetch_approve("sign");
                                foreach ($fetched as $row) {
                                    $id = $row[0];
                                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                     <td>$row[3]</td>
                      <td><a href='deleteaccess.php?id={$id};'> <button class='btn-sm btn-danger mr-3' name='id'>delete</button></a>
                       <a href='disapprove.php?id={$id};'> <button class='btn-sm btn-danger mr-4' name='id'>disapprove</button></a></td>
                     
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <footer
                    <span>
    <hr><p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>



</span>
                </div>
                </footer>
            </div>


</nav>
<?php
if (isset($_POST["submit"])) {
    $pass = $_POST["password"];
    $con_pass = $_POST["confirm_password"];

    if ($pass == $con_pass) {
        $data = array(

            'username' => $_POST["username"],
            'password' => $_POST["password"],
        );
        $dbcon->insertdata("admins", $data);

        if ($dbcon) {
            $_SESSION["error message"] = "successfully added";
        } else {
            $_SESSION["error message"] = "NOT added";
        }
        echo $pass . $con_pass;
    } else {
        $_SESSION["error message"] = "passwords do not match";
    }
}
?>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>