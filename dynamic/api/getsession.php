<?php
    session_start();
    echo $_SESSION["email"]."|--sep--|".$_SESSION["pass"];
?>