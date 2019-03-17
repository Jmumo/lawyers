<?php
require_once 'database.php';
require_once ("includes/sessions.php");
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <!--    <link rel="stylesheet" href="boot/bootstrap-3.3.7/dist/css/bootstrap.css">-->
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<div>
    <div><?php echo success();?></div>
    <div style="margin-left: 94%;font-family: 'Agency FB';font-size: large">
        <a href="index.php">logout</a>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">LawyersInc</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="lawyers.board.php">Notice board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.home.php">Blog</a>
                </li>
                <li class="active nav-item">
                    <a class="nav-link" href="lawyers.home.php">home</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<div class="container pre-scrollable mx-0 h-50">
    <table class="table table-striped  table-hover">
        <thead class="thead-dark ">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Name</th>
            <th>Occupation</th>
            <th>Email</th>
            <th>Contact</th>
            <th>address</th>
            <th>Description</th>
            <th>lawyer</th>
        </tr>
        </thead>
        <?php

        $fetched = $dbcon->fetchdata("cases");
        foreach ($fetched as $row) {
            $id=$row[0];


            echo "<tr>
<td>
                   <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">
                     book case
</button>
</td>
                     <td>$id</td>
                     <td>$row[1] &nbsp;&nbsp;&nbsp;&nbsp;$row[2]</td>
                     <td>$row[3]</td>
                     <td>$row[4]</td>
                     <td>$row[5]</td>
                     <td>$row[6]</td>
                     <td>$row[7]</td>
                      <td>$row[8]</td>
            </tr>";
              }
        ?>

        </tr>
    </table>
</div>
<div class="row ">
    <h3>
        <hr style="font-weight: bold">
    </h3>
</div>
<div class="container mx-0 h-50">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                create schedule
            </button>
        </li>
    </ul>
    <div class=" container pre-scrollable">
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">create schedule</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="lawyers.home.php" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">open date:</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">subject:</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Matter:</label>
                                <textarea type="text" class="form-control" id="matter" name="matter"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">lawyer:</label>
                                <input type="text" class="form-control" id="lawyer" name="lawyer">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="create">Save changes</button>
                            </div>

                        </form>
                        <?php
                         if (isset($_POST["create"])) {
                    $data = array(
                        'date'=>$_POST["date"],
                        'practise'=>$_POST["subject"],
                        'matter'=>$_POST["matter"],
                        'lawyer'=>$_POST["lawyer"]


                    );
                    echo $dbcon->insertdata("schedule", $data);
                }

                        ?>

                    </div>
                </div>
            </div>
        </div class="ml-0">
        <table class="table table-striped  table-hover">
            <thead class="thead-dark">
            <tr>

                <th>open date</th>
                <th>subject</th>
                <th>matter</th>
                <th>lawyer</th>
                <th>Days remaining</th>
            </tr>
            </thead>
            <?php

            $fetched = $dbcon->fetchdata("schedule");
            foreach ($fetched as $row) {
              $time1 = strtotime($row[1]);
                @$time2=strtotime(date(m.d.y));
                $diffrence=$time1-$time2;
//    echo $diffrence;
                $final=floor($diffrence/(60*60*24));


                echo "<tr>
</td>
                     
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                     <td>$row[3]</td>
                     <td>$row[4]</td>
                      <td>$final.days</td>
                    
            </tr>";
            }
            ?>

            </tr>
        </table>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">lawyers name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="lawyers.home.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">lawyers name:</label>
                        <input type="text" class="form-control" id="recipient-name" name="lawyer">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">case id:</label>
                        <input type="text" class="form-control" id="number" name="number">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                </form>
                <?php
                if (isset($_POST["submit"])) {
                    $data = array(

                            'lawyer'=>$_POST["lawyer"],
                            'id'=>$_POST["number"]

                    );
                   echo $dbcon->update_law("cases", $data);
                }


                ?>
            </div>

        </div>
    </div>
</div>
<script>
    const getName = document.getElementById('prompt');
    getName.addEventListener("click", pickName);

    function pickName() {
        let lawyerName = prompt("Lawyer Name")
        console.log(lawyerName)
    }
</script>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>