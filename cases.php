<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
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
                            <li class=" sidebar-link text-center mb-2">
                                <a href="manageaccess.php" class="text-white text-center nav-link">manage
                                    access</a>
                            </li>
                            <li class="current sidebar-link text-center mb-2">
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
                <div class="col-md-9 ml-auto details " style=" height: 100vh">


                    <div class="container pre-scrollable col-lg-12">
                        <div class="container mx-0 h-50">
                            <table class="table table-striped  table-hover">
                                <thead class="thead-dark ">
                                <tr>
                                    <th>assign a lawyer</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>lawyer</th>
                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("cases");
                                foreach ($fetched as $row) {
                                    $id = $row[0];

                                    if (strlen($row[7]) > 20) {
                                        $row[7] = substr($row[7], 0, 20) . "....";
                                    }
                                ?>
                                    <tr>
<td>
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                     assign lawyer
</button>
</td>
                     <td><?php echo $id?></td>
                     <td><?php echo $row[1]?> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[2]?></td>
                     
                     <td><?php echo $row[6]?></td>
                     <td><?php echo $row[7]?>
                         <a href=adminread.php?id=<?php echo $id; ?>>read more</a></td>
                      <td><?php echo $row[8]?></td>
            </tr>
                               <?php }?>


                                </tr>
                            </table>


                        </div>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">lawyers name</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="cases.php" method="post">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">lawyers name:</label>
                                                <select class="form-control" id="lawyer" name="lawyer">
                                                    <?php
                                                    $fetched = $dbcon->fetch_approve("sign");
                                                    foreach ($fetched as $row) {
                                                        ?>
                                                        <option><?php echo $row[1] ?></option>
                                                        <option></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="submit">Save
                                                    changes
                                                </button>
                                            </div>
                                        </form>
                                        <?php

                                        if (isset($_POST["submit"])) {
                                            $fetched=$dbcon->fetchdata("cases");
                                            foreach ($fetched as $row){
                                                $id= $row[0];
                                            }
                                            $data = array(

                                                'lawyer' => $_POST["lawyer"],
                                                'id' => $id,

                                            );
                                            echo $dbcon->update_law("cases", $data);
                                        }


                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer style="margin-left: 50%;color: #ff251e; font-family: 'Lucida Sans Unicode'">
                    <span>
    <hr><button class="btn-block"></button><hr>

                        <p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>



</span>
            </div>
            </footer>
        </div>


</nav>

<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>