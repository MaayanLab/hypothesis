
    <h6>Approve</h6>

<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    if (strpos(getcwd(), 'messaging') !== false) {
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
    
    $sql="SELECT DISTINCT
              user.uid, user.username, user.profilepic, connections.connection_id
          FROM
              user, connections
          WHERE
              user.uid = connections.user_id
              AND (connections.connection_id = ?)
              AND (connections.approved = 0);";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3]);
    while($stmt->fetch()){
        $rid = $data[0];
        $rname = $data[1];
        $pic = $data[2];
        
        ?>
        <div class="row contact" onclick='approveconnection("<?php echo $data[1].",".$data[0].",".$data[2]; ?>")'>
          <div class="col-3">
            <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[2];?>">
          </div>
          <div class="col-6 small">
            <?php echo $data[1]; ?>
          </div>
          <div class="col-3">
            <i class="fas fa-user-plus"></i>
          </div>
        </div>
        
        <?php
    }
    
    $sql="SELECT DISTINCT user.uid, user.username, user.profilepic FROM connections, user WHERE user_id=? AND connections.connection_id = user.uid AND approved=0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2]);
    while($stmt->fetch()){
        $rid = $data[0];
        $rname = $data[1];
        $pic = $data[2];
        
        ?>
        <div class="row">
          <div class="col-3">
            <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[2];?>">
          </div>
          <div class="col-6 small">
            <?php echo $data[1]; ?>
          </div>
          <div class="col-3">
            <i class="fas fa-hourglass-half"></i>
          </div>
        </div>
        
        <?php
    }
    
    $stmt->close();

?>

    <hr>
    <h6>Search</h6>
    <div class="row" id="searchresults"></div>
    
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-0 my-0 my-md-0 mw-100">
    
  </form>
    







