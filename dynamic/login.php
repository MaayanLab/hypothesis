<?php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    $response = file_get_contents('https://amp.pharm.mssm.edu/charon/login?username='.$_GET["email"]."&password=".$_GET["password"]);
    $response = json_decode($response);
    
    if($response->status === "success"){
        $userid = $response->message;
        $email = $response->task;
        
        session_start();
        
        $_SESSION["email"] = $_GET["email"];
        $_SESSION["pass"] = $_GET["password"];
        
        $_SESSION["user"] = "Alexander Lachmann";
        $_SESSION["userid"] = $userid;
        echo "Login success";
    }
    else{
        sleep(5);
        echo "Login failed";
    }
?>