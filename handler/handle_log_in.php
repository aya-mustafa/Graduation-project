<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();

//include_once "../includes/fun.php";
include_once "../classes/db.php";
include_once "../handler/fun.php";


if( isset($_POST["email"]) && isset($_POST["password"])){

    $email=$_POST["email"];
    $password=$_POST["password"];
    $_SESSION["email"]=$_POST["email"];

    $email=trim($email);
    $user_password=hashing($password);


}
else{

    header("location: ../log_in.php");

}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";

$sql_select="select user_email , user_password , is_admin from users where user_email='$email'";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
$row = $result->fetch_assoc();

if ($result->num_rows == 0){
    $_SESSION["error_log_in"]="the email is not exist";
    
    header("location: ../logIn.php");
    die();
}


if ($user_password!=$row["user_password"])
{
    $_SESSION["error_log_in"]="the password is incorrect";
    header("location: ../logIn.php");
        die();
}


if ($email!=$row["user_email"])
{
    $_SESSION["error_log_in"]="the email is correct";
    header("location: ../logIn.php");
        die();
}


$_SESSION["loged_in"]=1;
$_SESSION["is_admin"]=$row["is_admin"];
$_SESSION["user_email"]="$email";
header("location: ../profile.php");
