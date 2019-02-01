<?php
session_start();

    if ($_SESSION['username']) {
        if ($_SESSION['userlevel']=="novice") {
            header("Location:easy.html");
        }
        elseif ($_SESSION["userlevel"]=="expert") {
            header("Location:hard.html");
        }
        elseif ($_SESSION["userlevel"]=="intermediate") {
            header("Location:medium.html");
        }
    }
    else{
        header("Location:index.php");
    }

?>
