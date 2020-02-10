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
    
    $domain = $_GET["domain"];
    
    $sql="SELECT prediction.userid, prediction.name, prediction.date, prediction.size, user.username, user.profilepic, prediction.maxbench, prediction.predictionkey
    FROM prediction INNER JOIN user ON prediction.userid=user.uid ORDER BY prediction.maxbench DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
    
    $json = new stdClass();
    $json->predictions = array();
    
    $counter = 0;
    while ($stmt->fetch()) {
        $data[6] = round(100*$data[6],4);
        $temp = new stdClass();
        $temp->name = $data[1];
        $temp->key = $data[7];
        $temp->username = $data[4];
        $temp->userid = $data[0];
        $temp->score = $data[6];
        $temp->date = $data[2];
        $temp->userpicture = $data[5];
        array_push($json->predictions, $temp);
    }

$myJSON = json_encode($json);
echo $myJSON;

?>


