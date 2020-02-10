<?php
    session_start();
    $_SESSION["user"] = "";
    $_SESSION["userid"] = "";
    session_destroy();
    echo "Logout success";
?>