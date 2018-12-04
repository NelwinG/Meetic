<?php

    if (isset($_GET['USERS']) && $_GET['USERS'] != "")
    {
        $cakeaucitron = new bdd();
        $cakeaucitron->GET_users();
   

    }
   
} 
catch (PDOExeption $e) 
{
    echo "Connection failed : " . $e->getMessage();
}

?>


