
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    if (strpos(getcwd(), 'api') !== false) {
      require '../dbconfig.php';
    }
    elseif (strpos(getcwd(), 'dynamic') !== false) {
      require 'dbconfig.php';
    }
    else{
      require 'dynamic/dbconfig.php';
    }
    
    if(!isset($_SESSION)){
      session_start();
    }
    
    $userid = $_SESSION["userid"];
    
    if(isset($_SESSION["userid"])){
        $profilepic = $_POST["imageurl"];
        $_SESSION["profilepic"] = $_POST["imageurl"];
        
        $sql = "UPDATE user SET profilepic=? WHERE uid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $profilepic, $userid);
        $stmt->execute();
        $stmt->close();
    }
    else{
        echo "User not logged in. Can only submit predictions with correct authentication.";
    }
?>