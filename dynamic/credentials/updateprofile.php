<?php
    require '../dbconfig.php';
    
    $userid = $_POST["userid"];
    $username = $_POST["userid"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $desciption = $_POST["description"];
    $affiliation = $_POST["affiliation"];
    $picurl = $_POST["picurl"];
    
    $response1 = file_get_contents('https://amp.pharm.mssm.edu/charon/createuser?username='.$email."&password=".$password."&firstname=".$firstname."&lastname=".$lastname."&invitationKey=".$invitationkey);
    $response = json_decode($response1, true);
    
    if($response["status"] === "success"){
        $userid = $response["message"];
        $email = $response["task"];
        $username = $firstname." ".$lastname;
        
        $sql="UPDATE user SET username = ?, firstname = ?, lastname = ?, affiliation = ?, description = ?, picurl = ?) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $username, $firstname, $lastname, $affiliation, $description, $picurl);
        $stmt->execute();
        
        session_start();
        $_SESSION["user"] = $username;
        $_SESSION["userid"] = $userid;
        echo "registering success";
    }
    else if($response["message"] === "username already taken"){
        sleep(0.5);
        echo "duplicate";
    }
    else{
        sleep(0.5);
        echo $response1;
    }
?>