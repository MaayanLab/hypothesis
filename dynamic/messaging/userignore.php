
<?php
    if (strpos(getcwd(), 'messaging') !== false) {
      session_start();
      require '../dbconfig.php';
    }
    else{
      require 'dbconfig.php';
    }
    
    $userid = $_SESSION["userid"];
    $connectid = $_POST["connectid"];
    
    echo $userid;
    echo "<br>";
    echo $connectid;
    
    $sql="UPDATE connections SET approved=-1 WHERE user_id=? AND connection_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $userid, $connectid);
    $stmt->execute();
    $stmt->close();
?>







