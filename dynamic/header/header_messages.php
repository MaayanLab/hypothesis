
<?php

    $userid = $_SESSION["userid"];
    
    $sql="SELECT COUNT(*) FROM messages WHERE receiver_id=? AND viewed = 0";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0]);
    $stmt->fetch();
    $newmessages = $data[0];
    $stmt->close();
?>

<!-- Nav Item - Messages -->

<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-envelope fa-fw"></i>
    <!-- Counter - Messages -->
    <?php 
    if($newmessages > 0){
    ?>
    <span class="badge badge-danger badge-counter"><?php echo $newmessages;?></span>
    <?php
    }
    ?>
  </a>
  <!-- Dropdown - Messages -->
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
      Message Center
    </h6>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    $sql="select distinct sender.username as senderName, sender.uid as sender_id,
                receiver.username as receiverName, receiver.uid as receiver_id,
                msg.message_title, msg.message_body, msg.date,
                sender.profilepic, receiver.profilepic
        from messages AS msg
            inner join user AS sender on msg.sender_id = sender.uid
            inner join user AS receiver on msg.receiver_id = receiver.uid
        WHERE receiver.uid=?
        ORDER BY msg.date DESC LIMIT 4 OFFSET 0";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8]);
    
    while ($stmt->fetch()) {
      
?>

    <a class="dropdown-item d-flex align-items-center" onclick="navi('message')" href="javascript:void(0);">
      <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="<?php echo $data[7];?>" alt="">
        <div class="status-indicator bg-success"></div>
      </div>
      <div class="font-weight-bold">
        <div class="text-truncate"><?php echo $data[4];?></div>
        <div class="small text-gray-500"><?php echo $data[0];?> · <?php echo $data[6];?></div>
      </div>
    </a>

<?php
    }

?>

    <a class="dropdown-item text-center small text-gray-500" href="#" onclick="navi('message')">Read More Messages</a>
  </div>
</li>
