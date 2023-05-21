<?php

ini_set('display_errors', true);
error_reporting(E_ALL);
include_once "../classes/db.php";
include_once "./fun.php";
session_start();

if(isset($_POST["act_id"]) && isset($_POST["act_type"]) ){
    

    $act_id=$_POST["act_id"];
    $act_type=$_POST["act_type"];
    
    $_SESSION["act_id"]=$_POST["act_id"];
    
   
    $act_type=trim($act_type);
    $act_id=trim($act_id);


}

if(empty($_POST["act_id"]) || empty($_POST["act_type"]) ){
       
    $_SESSION["error_del_act"]="please fill all data";
    header("location: ../admin.php");
    die();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";


$sql_select="select * from activities where `id`='$act_id' and `act_type`='$act_type'";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
if ($result->num_rows == 0){
    $_SESSION["error_del_act"]="this activity is not exixt";
    
    header("location: ../admin.php");
    $conn->close();
    die();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";


$sql_select="DELETE FROM activities WHERE `activities`.`act_type` = '$act_type' AND `activities`.`id` = '$act_id'";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
$_SESSION["act_deleted"]="The activity has been deleted succesfully";
header("location: ../admin.php");

