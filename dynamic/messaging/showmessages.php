

            <h6>Message Feed</h6>
<!--
               <div class="filter filter-basic">
                  <div class="filter-nav">
                    <div class="row message_title">
                    <div class="col-4">
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-0 my-0 my-md-0 mw-100" onsubmit="addfilter()" >
                        <div class="input-group message_filter">
                          <input type="text" class="form-control bg-light border-0 message_filter" id="filtertext" placeholder="Add Filter" aria-label="filter" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-primary btn-sm message_filter" type="button" onclick="addfilter()">
                              <i class="fas fa-filter"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                    </div>
                    
                    <div class="col-8" id="message_filter_list">
                        <button class="btn btn-primary message_filter removebtn" data-filter="">Dr. No</button>
                        <button class="btn btn-primary message_filter removebtn" data-filter="nature">Creepy</button>
                        <button class="btn btn-primary message_filter removebtn" data-filter="food">Dog</button>
                        <button class="btn btn-primary message_filter removebtn" data-filter="architecture">Zero</button>
                    </div>
                </div>
              </div>
            </div>
            -->
            <div id="newsfeedcontent" style="max-height: 720px; overflow-y: auto; overflow-x: hidden;">
            

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
    
    $sql="select distinct sender.username as senderName, sender.uid as sender_id,
                receiver.username as receiverName, receiver.uid as receiver_id,
                msg.message_title, msg.message_body, msg.date,
                sender.profilepic, receiver.profilepic
        from messages AS msg
            inner join user AS sender on msg.sender_id = sender.uid
            inner join user AS receiver on msg.receiver_id = receiver.uid
        WHERE receiver.uid=? OR sender.uid=?
        ORDER BY msg.date DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $userid, $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8]);
    
    while ($stmt->fetch()) {
      
      if($data[1] != $userid){

?>

<div class="card newsfeed">
    <div class="row">
      
      <div class="col-2">
        <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[7];?>">
      </div>
      
      <div class="col-9 small">
        <a href="profile" class="username"><?php echo $data[0];?></a> | <b><?php echo $data[4];?></b> | <?php echo $data[6];?>
      </div>
      
      <div class="col-1 large">
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Message Options</div>
              <a class="dropdown-item" href="#">Reply <i class="fas fa-comment-dots grey"></i></a>
              <a class="dropdown-item" href="#">Forward <i class="fas fa-reply-all grey"></i></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Copy message <i class="fas fa-copy grey"></i></a>
            </div>
          </div>
      </div>
    
    </div>
    
    <div class="message_body row small">
      <?php echo $data[5]; ?>
    </div>
    <hr>
</div>

<?php
  }
  else{
?>


<div class="card newsfeed sent">
    <div class="row">
      
      <div class="col-2">
        <img width=34 height=34 class="img-profile rounded-circle" src="<?php echo $data[8];?>">
      </div>
      
      <div class="col-9 small">
        <a href="profile" class="username"><i class="fas fa-paper-plane"></i> <?php echo $data[2];?></a> | <b><?php echo $data[4];?></b> | <?php echo $data[6];?>
      </div>
      
      
        <div class="col-1 large">
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Message Options</div>
                <a class="dropdown-item" href="#">Reply <i class="fas fa-comment-dots grey"></i></a>
                <a class="dropdown-item" href="#">Forward <i class="fas fa-reply-all grey"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Copy message <i class="fas fa-copy grey"></i></a>
              </div>
            </div>
        </div>
        
      </div>
    
    <div class="message_body row small">
      <?php echo $data[5]; ?>
    </div>
    <hr>
</div>


<?php
    }
  }
  

$sql="UPDATE messages SET viewed=1 WHERE receiver_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $userid);
$stmt->execute();
$stmt->close();

?>

      </div>




