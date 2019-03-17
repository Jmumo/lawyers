<?php
require_once 'database.php';
require_once ("includes/sessions.php");
require_once ("includes/redirect.php");
?>
<html>
<head>
    <script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>
<style>
    .rounded {
        width: 150px;
        height: 80px;
        border: solid 1px black;
    }
</style>
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
                            <li class="current text-center mb-2"></i>
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
                                <a href="admin.expertise.php" class="text-white text-center nav-link">manage expertise</a>
                            </li>
                            
                        </ul>
                    </div>

                </div>

                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details " style="overflow: scroll; height: 100%">
                    <form action="home.admin.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success();?></div>
                        <h3 class="page-header">manage workers</h3>
                        <div class="form-group">
                            <label for="name"><span class="">first name</span></label>
                            <input type="text" class="form-control" id="first_name" placeholder="enter first name"
                                   name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="second_name"><span class="">second name</span></label>
                            <input type="text" class="form-control" id="second_name" placeholder="enter second name"
                                   name="second_name">
                        </div>
                        <div class="form-group">
                            <label for="department"><span class="">department</span></label>
                            <input type="text" class="form-control" id="department" placeholder="enter department"
                                   name="department">
                        </div>
                        <div class="form-group">
                            <label for="image"><span class="">image</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="submit" value="add workers">
                        </div>
                    </form>
                    <div class="container col-lg-12">
                        <div class="container pre-scrollable mx-0 h-50">
                            <table class="table table-hover table-striped ">
                                <thead class="thead-dark  ">
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Second name</th>
                                    <th>Department</th>
                                    <th>image</th>

                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("workers");
                                foreach ($fetched as $row) {
                                    echo "<tr>
      
                    <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                      <td>$row[3]</td>
                      <td><img src=\"photos /$row[4]\" class=\"rounded\"><br></td>
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>
                    <footer class="ml-auto">
                        <div class="container-fluid text-center mt-4">
<span >
    <hr><p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
    


</span>
                        </div>
                    </footer>
                </div>


</nav>
    <?php
    if (isset($_POST["submit"])) {
        function getExtension($str)
        {
            $i = strrpos($str, ".");
            if (!$i) {
                return "";
            }
            $l = strlen($str) - $i;
            $ext = substr($str, $i + 1, $l);
            return $ext;
        }

        $filename = stripslashes($_FILES['image']['name']);    // get the original name
// get the extension of the file in a lower case format
        $extension = getExtension($filename);
        $extension = strtolower($extension);
        $image_name = time() . '.' . $extension; //we will give an unique name
        $newname = 'photos/' . $image_name;
        $data = array(

            'first_name' => $_POST["first_name"],
            'second_name' => $_POST["second_name"],
            'department' => $_POST["department"],
            'photo' => $image_name
        );
        echo $dbcon->insertdata("workers", $data);

        if ($dbcon){
            $_SESSION["error message"]="successfully added";
        }

//            Process Image

        $copied = copy($_FILES['image']['tmp_name'], $newname);

        if ($copied) {



        }



    }
    ?>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>