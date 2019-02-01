<?php
session_start();
if(session_destroy()) // session unset redirecting to login page 
{
    header("Location: index.php");
}
?>
