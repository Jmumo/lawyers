<?php
require_once 'database.php';
require_once("includes/sessions.php");
?>
<html>
<head>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/blog.css">
</head>
<body>
<style>
    .rounded {
        width: 550px;
        height: 300px;
        border: solid 1px black;
        background-color: #f5f5f5;
        overflow: hidden;
    }

    #desc {
        margin-top: 2px;
        font-weight: bold;
        color: #868686;
    }

    #post {
        font-family: "Lucida Sans Unicode", "lucida grande", "sans-serif";
        text-align: justify;
        font-size: 0.9em;
    }

    #title {
        font-family: Bitter, Georgia, "Times New Roman", sans-serif;
        font-weight: bold;
        color: #005e90;
    }

    #title:hover {
        color: #0090db;
    }
    #btnn{
        float: right;
        margin-right: 30%;
    }

</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">LawyersInc</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="lawyers.home.php">home</a>
            </li>
            <li class=" active nav-item">
                <a class="active nav-link" href="blog.home.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link" href="lawyers.board.php">Notice board</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
        </form>
    </div>
</nav>
<div>

    <button type="button" class="btn btn-primary btn-link btn-block text-right text-warning" data-toggle="modal"
            data-target="#exampleModal">
        <p class="mr-4 mb-0">Post a Blog</p>
    </button>
</div>
<div class="container">
    <div class="blog">
        <h2>bloggers home</h2>
        <p class="lead">share your experience</p>
    </div>

    <div class="row">
        <div class="container col-lg-12">
            <table class="table table-hover  ">
                <?php

                $fetched = $dbcon->fetchdata("blogs");
                foreach ($fetched

                as $row) {
                $post_id = $row[0];
                $image = $row[3];
                $author = $row[2];
                $date = $row[4];
                $post = $row[1];
                $title = $row[5];
                if (strlen($post) > 90) {
                    $post = substr($post, 0, 90) . "....";

                    ?>
                    <tr>
                        <td><img src="blog/<?php echo $image ?>" class="rounded img-thumbnail"><br>
                            <span id='title'><h1>&nbsp;<?php echo $title ?></h1></span><br>
                            <span id='desc'><span>&nbsp;&nbsp;&nbsp;&nbsp;By:</span>&nbsp;<?php echo $author . $date ?></span><br>
                            <span id='post'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $post ?></span><br>
                            <a href='fullpost.php?id=<?php echo $post_id;?>'<span id="btnn" class='btn btn-info btn-sm'>read
                                more &rsaquo;&rsaquo;&rsaquo;</span></a>
                        </td>


                    </tr>

                <?php }} ?>

            </table>
        </div>


    </div>
</div>

<div id="footer">
    <hr style="background-color: white">
    <p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
    <hr style="background-color: white">


</div>


<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">post details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="blog.home.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <div>
                            <label for="description"><span class="">description</span></label>
                            <textarea type="text" class="form-control" id="description" placeholder="enter description"
                                      name="description" rows="5"></textarea>
                        </div>
                        <div>
                            <label for="title"><span class="">title</span></label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="form-group">
                            <label for="image"><span class="">image</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                        </div>
                    </form>

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
                        $newname = 'blog/' . $image_name;
//                        $image_name=$_FILES["image"]["name"];
//                        $path="blog/".basename($_FILES["image"]["name"]);
                        $date = date("D/M/Y");
                        $author = $_SESSION["user"];
                        $data = array(
                            'post' => $_POST["description"],
                            'photo' => $image_name,
                            'author' => $author,
                            'date' => $date,
                            'title' => $_POST["title"],

                        );
                        echo $dbcon->insertdata("blogs", $data);
                        if ($dbcon) {
                            $_SESSION["error message"] = "successfully posted";
                        }
//                        move_uploaded_file($_FILES["image"]["tmp_name"],$path);


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

</body>
</html>
