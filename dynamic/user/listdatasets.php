
<style>
    .custom-file-input:hover{
        cursor: pointer !important;
    }
    .custom-file:hover{
        cursor: pointer !important;
    }
    
    .file-select{
      margin-left: -16px;
      margin-right: -16px;
      margin-bottom: 10px;
      padding: 0px;
    }
    
    .padtop{
      margin-top: 16px;
    }
    .centerme{
      margin-left: 16px;
    }
    .center-font{
      padding: 8px;
    }
</style>



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
    
    $userid = $_GET["u"];
    
?>


<div class="row">
    <div class="col-12">

<?php

    $sql = "SELECT id, name, description, filename, size, user_id, date, url
            FROM datasets
            WHERE user_id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
    
    $counter = 0;
    
    while ($stmt->fetch()) {
              ?>
              
              <div class="row predictionrow">
                <div class="col-10">
                <div class="row">
                  <div class="col-4 predictiontitle">
                    <?php echo $data[1];?>
                  </div>
                  <div class="col-8 methodtitle">
                    <a download="<?php echo $data[3];?>" href="<?php echo $data[7];?>"><?php echo $data[3];?></a> | <i class="fas fa-database"></i> <span class="filesize"><?php echo $data[4];?></span>
                  </div>
                  <div class="col-12 dates small"><i class="fas fa-calendar"></i>
                    <span class="datefield"><?php echo $data[6];?></span>
                  </div>
                </div>
                </div>
                
                <div class="col-2">
                  <div class="row">
                    <div class="col-6">
                      <i class="fas fa-eye-slash"></i>
                    </div>
                    <div class="col-6 counts text-right">
                      <?php echo $data[0];?>
                    </div>
                  </div>
                </div>
              </div>
     <?php
          }
          $stmt->close();
      ?>

    </div>
</div>



