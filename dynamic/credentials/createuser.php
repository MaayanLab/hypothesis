<?php
    
    require '../dbconfig.php';
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $invitationkey = "charon2018";
    
    $response1 = file_get_contents('https://amp.pharm.mssm.edu/charon/createuser?username='.$email."&password=".$password."&firstname=".$firstname."&lastname=".$lastname."&invitationKey=".$invitationkey);
    $response = json_decode($response1, true);
    
    if($response["status"] === "success"){
        $userid = $response["message"];
        $email = $response["task"];
        $username = $firstname." ".$lastname;
        
        $sql="INSERT INTO user (uid, username, firstname, lastname) VALUES (?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $userid, $username, $firstname, $lastname);
        $stmt->execute();
        
        session_start();
        $_SESSION["user"] = $username;
        
        $_SESSION["username"] = $firstname." ".$lastname;
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["userid"] = $userid;
        $_SESSION["profilepic"] = "images/loginicon.png";
        
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