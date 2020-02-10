
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    if (strpos(getcwd(), 'submission') !== false) {
      require '../dbconfig.php';
    }
    else{
      require 'dbconfig.php';
    }
    $userid = $_SESSION["userid"];
    
    $checked_users = [];
    
    $sql="SELECT DISTINCT user.uid FROM connections, user, methodshare WHERE user_id=? AND connections.connection_id = user.uid AND methodshare.userid = user.uid AND approved=1 AND methodshare.methodid=? AND methodshare.allowed=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $userid, $method_id);
    $stmt->execute();
    $stmt->bind_result($data[0]);
    
    while($stmt->fetch()){
      array_push($checked_users, $data[0]);
    }
    
    $sql="SELECT DISTINCT user.uid, user.username, user.profilepic FROM connections, user WHERE user_id=? AND connections.connection_id = user.uid AND approved=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2]);
    while($stmt->fetch()){
        $rid = $data[0];
        $rname = $data[1];
        $pic = $data[2];
        
        if (in_array($rid, $checked_users, TRUE)) {
        
        ?>
        <li >
          <label>
            <input type="checkbox" class="uusershare" value="<?php echo $data[0];?>" checked> <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[2];?>"> <?php echo $data[1]; ?>
          </label>
        </li>
        
        <?php
        }
        else{
        ?>
        <li >
          <label>
            <input type="checkbox" class="uusershare" value="<?php echo $data[0];?>"> <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[2];?>"> <?php echo $data[1]; ?>
          </label>
        </li>
        
        <?php
        }
    }
    $stmt->close();
?>

