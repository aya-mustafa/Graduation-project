<?php 


ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();

//include_once "../includes/fun.php";
include_once "../classes/db.php";
include_once "../handler/fun.php";


if( isset($_GET["act_id"]) && isset($_GET["act_type"])){

    $act_id=$_GET["act_id"];
    $act_type=$_GET["act_type"];
    $email=$_SESSION["user_email"];

    $email=trim($email);
    $act_id=trim($act_id);
    $act_type=trim($act_type);
   
}
else{

    header("location: ../profile.php");

}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";


$sql_select="DELETE FROM enquired_act where `user_email` ='$email' and `act_id` = '$act_id' and `act_type`= '$act_type' ";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);

$sql_select="DELETE FROM massages where `user_email` ='$email' and `act_id` = '$act_id' and `act_type`= '$act_type' ";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
$_SESSION["del_enquired"]="the enquierd activity has been deleted";
header("location: ../profile.php");




?>