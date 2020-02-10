
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    
    if (strpos(getcwd(), 'submission') !== false) {
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
    
    $sql="SELECT DISTINCT user.uid, user.username, user.profilepic FROM connections, user WHERE user_id=? AND connections.connection_id = user.uid AND approved=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2]);
    while($stmt->fetch()){
        $rid = $data[0];
        $rname = $data[1];
        $pic = $data[2];
        
        ?>
       
        <li >
          <label>
            <input type="checkbox" class="usershare" value="<?php echo $data[0];?>"> <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[2];?>"> <?php echo $data[1]; ?>
          </label>
        </li>
        
        <?php
    }
    $stmt->close();
?>





