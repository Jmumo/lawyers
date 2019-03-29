<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if (isset($_GET["id"])) {
//    $true="true";
    $data = array(
        'id' => $_GET["id"],
        'approve' => "false",
    );
    $exec = $dbcon->approve("sign", $data);
    if (!$exec) {
        $_SESSION["error message"] = "successfully disapproved";
        redirect_to("manageaccess.php");
    } else {
        echo "something went wrong";
    }
}