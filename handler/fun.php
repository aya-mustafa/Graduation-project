<?php


function testInput($data){
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    

}

function hashing($pass)
{
   $pass=md5($pass);
   return $pass;
}


function ifNotLoggedIn() {
    if (!isset($_SESSION["loged_in"]) || $_SESSION["loged_in"]==0) {
        header("location: ./index.php");
        die();
    }
}
function ifLoggedIn() {
    if (isset($_SESSION["loged_in"]) && $_SESSION["loged_in"]==1) {
        header("location: ./index.php");
        die();
    }
}



function ifNotAdmin() {
    if (!isset($_SESSION["loged_in"]) || $_SESSION["loged_in"]==0) {
        if (!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"]==0) {
            header("location: ./index.php");
            die();
    }

    }
}

?>