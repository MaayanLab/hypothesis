<?php

    ini_set("mysql.trace_mode", "1");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    require '../dbconfig.php';
    
    session_start();
    $userid = $_SESSION["userid"];
    $userid = "57d30af4ce9cfd84c6be3e022536a3cf";
    
    $sql="select distinct sender.username as senderName, sender.uid as sender_id,
                receiver.username as receiverName, receiver.uid as receiver_id,
                msg.message_title, msg.message_body, msg.date
        from messages AS msg
            inner join user AS sender on msg.sender_id = sender.uid
            inner join user AS receiver on msg.receiver_id = receiver.uid
        WHERE receiver.uid=? OR sender.uid=?";
        
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $userid, $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
    
    while ($stmt->fetch()) {
       echo "<br>".$data[0]." - ".$data[1]." - ".$data[2]."<br>";
    }
    
?>

