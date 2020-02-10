
    <h6>Contacts</h6>

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
    
    ?>
    
    <div id="contactlist">
    
    <?php
    
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
        <div class="row contact" onclick='selectrecipient("<?php echo $data[1].",".$data[0].",".$data[2]; ?>")'>
          <div class="col-3">
            <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[2];?>">
          </div>
          <div class="col-9 small">
            <?php echo $data[1]; ?>
          </div>
        </div>
        
        <?php
    }
    $stmt->close();
?>
    </div>
    <hr>
    <?php include "listwaiting.php"; ?>

    <div class="row" id="searchresults"></div>
    
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-0 my-0 my-md-0 mw-100">
    
    <div class="input-group" style="margin-top: 6px;">
      <input id="usersearch" type="text" class="form-control bg-light border-0 small" placeholder="Search ..." aria-label="Search" aria-describedby="basic-addon2"  oninput="searchusers();">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form>






