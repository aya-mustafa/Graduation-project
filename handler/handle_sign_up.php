<?php

ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();

include_once "../classes/db.php";
include_once "../handler/fun.php";
$admin_key_form_uni="1234567890";

if(isset($_POST["all_name"]) && isset($_POST["email"]) && isset($_POST["phone_number"]) && isset($_POST["second_password"]) && isset($_POST["first_password"])){
    

        $all_name=$_POST["all_name"];
        $email=$_POST["email"];
        $phone_number=$_POST["phone_number"];
        $first_password=$_POST["first_password"];
        $second_password=$_POST["second_password"];
        $admin_key=$_POST["admin_key"];

        $_SESSION["all_name"]=$_POST["all_name"];
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["phone_number"]=$_POST["phone_number"];
        $_SESSION["first_password"]=$_POST["first_password"];
        $_SESSION["second_password"]=$_POST["second_password"];
        $_SESSION["admin_key"]=$_POST["admin_key"];

        $all_name=trim($all_name);
        $email=trim($email);
        $phone_number=trim($phone_number);
        $admin_key=trim($admin_key);
        $first_password=hashing($first_password);
        $second_password=hashing($second_password);
    
    
}

if(empty($_POST["all_name"]) || empty($_POST["email"]) || empty($_POST["phone_number"]) || empty($_POST["second_password"]) || empty($_POST["first_password"])){

    

    
    $_SESSION["error_sign_up"]="please fill all data";

    header("location: ../signUp.php");
    die();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";


$sql_select="select user_email from users where user_email='$email'";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
if ($result->num_rows > 0){
    $_SESSION["error_sign_up"]="the email alredy exist";
    
    header("location: ../signUp.php");
}

if ($first_password!=$second_password)
{
    $_SESSION["error_sign_up"]="the password are not identcal";
    header("location: ../signUp.php");
        die();
}


$sql="INSERT INTO `users` (`user_email`, `user_name`, `user_phone`, `user_password`) 
VALUES ('$email', '$all_name', '$phone_number', '$first_password')";

if($admin_key==$admin_key_form_uni)
{
    $sql="INSERT INTO `users` (`user_email`, `user_name`, `user_phone`, `user_password`, `is_admin`) 
    VALUES ('$email', '$all_name', '$phone_number', '$first_password',1)";
        $_SESSION["is_admin"]="1";


}

$conn = connDB($servername, $username, $password, $dbname);
$conn->query($sql);
$_SESSION["loged_in"]="1";
$_SESSION["user_email"]="$email";
header("location: ../profile.php");



?>