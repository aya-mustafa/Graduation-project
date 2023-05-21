<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();
include_once "../classes/db.php";
include_once "./fun.php";


if( isset($_POST["act_id"]) && isset($_POST["act_type"])){

    $act_id=$_POST["act_id"];
    $act_type=$_POST["act_type"];
    $email=$_SESSION["user_email"];

    $email=trim($email);
    $act_id=trim($act_id);
    $act_type=trim($act_type);
   
}
else{

    header("location: ../showActive.php");

}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";


$sql_select="select * from activities where `id`='$act_id' and `act_type`='$act_type'";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
if ($result->num_rows == 0){
    $_SESSION["error_enquird_act"]="this activity is not exist anymore";
    
    header("location: ../showActive.php");
    $conn->close();
    die();
}

$sql_select="select * from enquired_act where `act_id`='$act_id' and `act_type`='$act_type' and `user_email`='$email'";
$conn = connDB($servername, $username, $password, $dbname);
$result1=$conn->query($sql_select);
if ($result1->num_rows > 0){

    $_SESSION["error_enquird_act"]="you have been already enquired to this activity";
    header("location: ../showActive.php");
    $conn->close();
    die();  
}



$row=$result->fetch_assoc();
$title_for_massage=$row["title"];
$date_for_massage=$row["start_date"];
$massage="You have subscribed to $act_type ($title_for_massage) that will be held in ($date_for_massage) and you have been notified of all the information in this message, so please adhere to the time and place allocated";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";

$sql_select="INSERT INTO `massages` (`act_type`, `act_id`,`user_email`,`Massage`) VALUES ('$act_type','$act_id','$email','$massage')";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);

$sql_select="INSERT INTO `enquired_act` (`act_type`, `act_id`,`user_email`) VALUES ('$act_type','$act_id','$email')";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);


$_SESSION["act_enquired"]="The activity has been enquierd succesfully";
header("location: ../showActive.php");
