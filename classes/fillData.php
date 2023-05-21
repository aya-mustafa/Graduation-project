<?php

class HandleData
{

    function reFillInputValue($se_name)

    {
       if(isset($_SESSION[$se_name]))
       {
        echo($_SESSION[$se_name]);
       }
       
        
    }

}


?>