<?php
    require '../dbconfig.php';
    
    $user_id = $_POST["userid"];
    $recipient_id = $_POST["recipientid"];
    $mtitle = $_POST["mtitle"];
    $mbody = $_POST["mbody"];
    
    $sql = "SELECT approved FROM connections WHERE user_id=? AND connection_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user_id, $recipient_id);
    $stmt->execute();
    $stmt->bind_result($data[0]);
    
    $approval = false;
    while ($stmt->fetch()) {
       $approval = $data[0];
    }
    $stmt->close();
    
    echo $user_id."  -  ".$recipient_id;
    
    if($approval){
        $sql = "INSERT INTO messages (sender_id, receiver_id, message_title, message_body) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $user_id, $recipient_id, $mtitle, $mbody);
        $stmt->execute();
        $stmt->close();
        echo "message sent";
    }
    else{
        echo "user not approved";
    }
?>