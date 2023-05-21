<?php 


ini_set('display_errors', true);
error_reporting(E_ALL);

include_once "./classes/db.php";
include_once "./handler/fun.php";

if($_SESSION["loged_in"]!="1")
{
    header("location: ./index.php");

}
$user_email=$_SESSION["user_email"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youth_care_project";



$sql_select="select user_name , user_phone , user_email from users where user_email='$user_email'";
$conn = connDB($servername, $username, $password, $dbname);
$result=$conn->query($sql_select);
$row = $result->fetch_assoc();



if ($result->num_rows == 0){
    $_SESSION["error_sign_up"]="the email is not exist";
    
    header("location: ./index.php");
}


function my_massage($servername, $username, $password, $dbname, $user_email){
    
    global  $all_data_to_show_massages;
    $all_data_to_show_massages=array();
    $sql_massage="select `act_type` ,`act_id` , `Massage` from massages where user_email='$user_email'";
    $conn = connDB($servername, $username, $password, $dbname);
    $result=$conn->query($sql_massage);
    $x=0;
    while($row = $result->fetch_assoc()) {  
        $all_data_to_show_massages["massages"][$x]=$row["Massage"];
        $all_data_to_show_massages["act_ids"][$x]=$row["act_id"];
        $all_data_to_show_massages["act_types"][$x]=$row["act_type"];
        
        $x++;
    }
   
return $all_data_to_show_massages;
}

$row_of_results=my_massage($servername, $username, $password, $dbname, $user_email);


if(!empty($all_data_to_show_massages))
{
    $act_ids=$row_of_results["act_ids"];
    $act_types=$row_of_results["act_types"];
    // print_r($act_type);
    function get_other_data($servername, $username, $password, $dbname,$act_ids,$act_types)
    {
            global  $all_data_to_show_massages1;
            $all_data_to_show_massages1=array();
        for($x = 0; $x < count($act_ids); $x++)
        {

            $sql_massage="select `title` ,`location` , `start_date`, `act_stat`,`activity_desc` from activities where id='$act_ids[$x]' and act_type='$act_types[$x]'";
            $conn = connDB($servername, $username, $password, $dbname);
            $result=$conn->query($sql_massage);
            $row_of_other_data=$result->fetch_assoc();

            $all_data_to_show_massages1['title'][$x]=$row_of_other_data["title"];
            $all_data_to_show_massages1['location'][$x]=$row_of_other_data["location"];
            $all_data_to_show_massages1['start_date'][$x]=$row_of_other_data["start_date"];
            $all_data_to_show_massages1['act_stat'][$x]=$row_of_other_data["act_stat"];
            $all_data_to_show_massages1['activity_desc'][$x]=$row_of_other_data["activity_desc"];

            
        }
    }
 get_other_data($servername, $username, $password, $dbname,$act_ids,$act_types);
 
}

?>