
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
        
        //$sql="SELECT id, genesymbol FROM genemap";
        
        //$stmt = $conn->prepare($sql);
        //$stmt->execute();
        //$stmt->bind_result($data[0], $data[1]);
        //$genemap = array();
        //while ($stmt->fetch()) {
        //    $genemap[$data[1]] = $data[0];
        //}
        
        $title = $_POST["title"];
        $method = $_POST["method"];
        $size = count($_POST["predictions"]);
        $pkey = $_POST["pkey"];
        
        //$pkey = uniqid();
        
        $sql="INSERT INTO prediction (name, method_id, userid, size, predictionkey) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssis', $title, $method, $userid, $size, $pkey);
        $stmt->execute();
        $subid = $conn->insert_id;
        
        //$sql="INSERT INTO predictionscores (submissionid, gene, property, score) VALUES (?, ?, ?, ?)";
        
        //foreach ($_POST["predictions"] as $obj) {
        
        //    $gene = $obj["gene"];
        
        //    if(array_key_exists($gene, $genemap)){
        //        $property = $obj["property"];
        //        $score = $obj["score"];
        //        $stmt = $conn->prepare($sql);
        //        $stmt->bind_param('iisd',$subid, $genemap[$gene], $property, $score);
        //        $stmt->execute();
        //    }
        //}
        $stmt->close();
    }
    else{
        echo "User not logged in. Can only submit predictions with correct authentication.";
    }
    
?>