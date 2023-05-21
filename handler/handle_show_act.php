<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include_once "./classes/db.php";
include_once "./handler/fun.php";






function show_act($act_type){
        
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "youth_care_project";
    $sql_select="SELECT * FROM `activities` where act_type='$act_type'";

    $conn = connDB($servername, $username, $password, $dbname);
    $act_result=$conn->query($sql_select);
    return($act_result);
}


?>