<?php

ini_set('display_errors', true);
error_reporting(E_ALL);
include_once "../classes/db.php";
include_once "./fun.php";
session_start();

if(isset($_POST["act_id"]) && isset($_POST["act_type"]) && isset($_POST["title"]) && isset($_POST["act_date"]) && isset($_POST["location"]) && isset($_POST["act_disc"])){
    

    $act_id=$_POST["act_id"];
    $act_type=$_POST["act_type"];
    $title=$_POST["title"];
    $act_date=$_POST["act_date"];
    $location=$_POST["location"];
    $act_disc=$_POST["act_disc"];

    $_SESSION["act_id"]=$_POST["act_id"];
    $_SESSION["act_type"]=$_POST["act_type"];
    $_SESSION["title"]=$_POST["title"];
    $_SESSION["act_date"]=$_POST["act_date"];
    $_SESSION["location"]=$_POST["location"];
    $_SESSION["act_disc"]=$_POST["act_disc"];

    $id_length=mb_strlen($act_id);
    if($id_length>10)
    {
        $_SESSION["error_add_act"]=" the length of id can not be more than 10 disits";
        header("location: ../admin.php");
        die();
    }

    $act_type=trim($act_type);
    $title=trim($title);
    $act_date=trim($act_date);
    $location=trim($location);
    $act_disc=trim($act_disc);


}

if(empty($_POST["act_id"]) || empty($_POST["act_type"]) || empty($_POST["title"]) || empty($_POST["act_date"]) || empty($_POST["act_date"]) ){
       
    $_SESSION["error_add_act"]="please fill all data";
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
if ($result->num_rows > 0){
    $_SESSION["error_add_act"]="this activity had alredy added before";
    
    header("location: ../admin.php");
    $conn->close();
    die();
}





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";

$sql_select="INSERT INTO `activities` (`act_type`, `id`, `title`, `activity_desc`, `start_date`, `act_stat`, `location`) VALUES ('$act_type','$act_id','$title','$act_disc','$act_date','1','$location')";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
$_SESSION["act_added"]="The activity has been added succesfully";
header("location: ../admin.php");

