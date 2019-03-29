<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if (isset($_GET["id"])) {
//    $true="true";
    $data = array(
        'id' => $_GET["id"],
        'approve' => "true",
    );
    $exec = $dbcon->approve("sign", $data);
    var_dump($data);
    if (!$exec) {
        $_SESSION["error message"] = "successfully approved";
        redirect_to("manageaccess.php");
    } else {
        echo "something went wrong";
    }
}