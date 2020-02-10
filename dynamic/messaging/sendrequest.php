
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    require '../dbconfig.php';
    
    $connection = $_POST["userid"];
    
    session_start();
    $userid = $_SESSION["userid"];
    
    $approved = 0;
    
    $sql="INSERT INTO connections (user_id, connection_id, approved) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $userid, $connection, $approved);
    $stmt->execute();
    
    $stmt->close();
?>


