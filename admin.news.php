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
                            <li class=" sidebar-link text-center mb-2"></i>
                                <a href="home.admin.php" class="text-white text-center nav-link ">manage workers</a>
                            </li>
                            <li class="current text-center mb-2">
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
                            <li class="sidebar-link text-center mb-2">
                                <a href="manageaccess.php" class="text-white text-center nav-link">manage
                                    access</a>
                            </li>
                            <li class="sidebar-link text-center mb-2">
                                <a href="index.php" class="text-white text-center nav-link">log out</a>
                            </li>

                        </ul>
                    </div>

                </div>

                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details " style="overflow: scroll; height: 100%">
                    <form action="admin.news.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <div>
                            <h3 class="page-header">manage news</h3>

                            <label for="description"><span class="">description</span></label>
                            <textarea type="text" class="form-control" id="description" placeholder="enter description"
                                      name="description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image"><span class="">image</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="submit" value="add news">
                        </div>
                    </form>
                    <div class="container col-lg-12">
                        <div class="container pre-scrollable mx-0 h-50">
                            <div><?php echo success(); ?></div>
                            <table class="table table-hover table-striped ">
                                <thead class="thead-dark  ">
                                <tr>
                                    <th>ID</th>
                                    <th>Department</th>
                                    <th>image</th>
                                    <th>control</th>


                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("news");
                                foreach ($fetched as $row) {
                                    $id = $row[0];
                                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                       <td><img src=\"photos/$row[2]\" class=\"rounded\"><br></td>
                       <td><a href='admin.newsdelete.php?id={$id};'> <button class='btn-sm btn-danger' name='id'>delete</button></a></td>
                    
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>
                        <footer class="ml-auto">
                            <div class="container-fluid text-center mt-4">
<span>
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


        'description' => $_POST["description"],
        'photo' => $image_name
    );
    echo $dbcon->insertdata("news", $data);
    if ($dbcon) {
        $_SESSION["error message"] = "successfully added";
    }

//            Process Image

    $copied = copy($_FILES['image']['tmp_name'], $newname);

    if (!$copied) {
//                $msg=base64_encode("Unsuccessful.");
//                header("Location: index.php?error=$msg");
        echo "Unsuccesful copying";
        exit();
    }// header("location:public.php");
    ;
}
?>
</div>
</div>
</div>
</div>

<div><span style="color: #FFFFFF; text-align: center">
    <p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
</span>
</div>
</body>
</html>