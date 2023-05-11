<?php

include('../functions/myfunctions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        redirect("../index.php","You are not an authorized user to access this page");
    }
}
else
{
    redirect("../login.php","Login to Continue");
}

?>