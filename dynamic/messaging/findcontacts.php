

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    require '../dbconfig.php';
    
    $usersearch = $_POST["usersearch"];
    $usersearch = "%".$usersearch."%";
    
    session_start();
    $userid = $_SESSION["userid"];
    
    $sql="SELECT user.uid, user.username, user.profilepic FROM user 
            WHERE (username LIKE ? OR lastname LIKE ? OR firstname LIKE ?)
            AND uid NOT IN (SELECT connection_id FROM connections WHERE user_id=?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $usersearch, $usersearch, $usersearch, $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2]);
    while($stmt->fetch()){
        $rid = $data[0];
        $rname = $data[1];
        $pic = $data[2];
        
        ?>
        <div class="row contact" style="width: 178px; margin-left: 2px;" onclick='sendrequest("<?php echo $data[1].",".$data[0]; ?>")'>
          <div class="col-3">
            <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[2];?>">
          </div>
          <div class="col-6 small text-truncate">
            <?php echo $data[1]; ?>
          </div>
          <div class="col-3">
            <i class="fas fa-user-plus"></i>
          </div>
        </div>
        
        <?php
    }
    $stmt->close();
?>


