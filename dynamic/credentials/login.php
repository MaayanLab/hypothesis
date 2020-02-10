<?php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    require '../dbconfig.php';
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if(strlen($email)>4 && strlen($password)>1){
        
        $response1 = file_get_contents('https://amp.pharm.mssm.edu/charon/login?username='.$email."&password=".$password);
        $response = json_decode($response1, true);
        
        if($response["status"] === "success"){
            $userid = $response["message"];
            $email = $response["task"];
            $fname = $response["fname"];
            $lname = $response["lname"];
            
            $sql="SELECT username, firstname, lastname, profilepic FROM user WHERE uid=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $userid);
            $stmt->execute();
            $stmt->bind_result($data[0], $data[1], $data[2], $data[3]);
            $stmt->fetch();
            
            session_start();
            
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["pass"] = $_POST["password"];
        
            $_SESSION["username"] = $data[0];
            $_SESSION["firstname"] = $data[1];
            $_SESSION["lastname"] = $data[2];
            $_SESSION["userid"] = $userid;
            $_SESSION["profilepic"] = $data[3];
            
            echo "Login success";
            
            $stmt->close();
        }
        else{
            sleep(1);
            echo $response1;
        }
    }
?>