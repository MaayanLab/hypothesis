
<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    
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
    
    if($userid == $_POST["user"]){
        $name = $_POST["name"];
        $filename = $_POST["filename"];
        $description = $_POST["description"];
        $url = $_POST["url"];
        $size = $_POST["size"];
        $datahash = $_POST["dhash"];
        
        $sql="INSERT INTO datasets (name, description, url, filename, user_id, size, datahash) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssis', $name, $description, $url, $filename, $userid, $size, $datahash);
        $stmt->execute();
        $subid = $conn->insert_id;
        
        $stmt->close();
    }
    else{
        echo "User not logged in. Can only submit predictions with correct authentication.";
    }
    
?>