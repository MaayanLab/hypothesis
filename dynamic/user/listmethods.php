<style>
    .methodsmall h6{
        color: black;
        padding-left: 5px;
    }
    .methodsmall h6:hover{
        cursor: pointer;
    }
    .methodsmall{
        padding: 10px;
        padding-left: 10px;
    }
    
    .methodsmall:hover{
        border-left: 7px solid dodgerblue !important;
        margin-left: -15px;
        padding-left: 6px;
    }
    
    .lab{
        margin-right: 5px;
        margin-top: 3px;
    }
    
    .collapse{
        padding: 30px;
        margin-top: 12px;
    }
    
    .edit-method:hover{
        color: black;
        cursor: pointer;
    }
    
    .headmethod{
        padding-left: -10px;
        margin-left: -13px;
        padding: 0px;
        padding-left: 10px;
    }
    .counter{
        color: #a700f5;
        font-size: 22px;
        font-weight: bold;
    }
    .noborder{
      padding: 0px !important;
      margin: 0px !important;
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
    
    $user_id = $_GET["u"];
    
    $sql = "SELECT method.id, method.title, method.subtitle, method.description, method.giturl, method.colaburl, method.accessibility, method.date, method.image, COUNT(prediction.method_id) methodcount 
            FROM method
            LEFT OUTER JOIN prediction ON prediction.method_id=method.id
            WHERE method.author_id=?
            GROUP BY prediction.method_id, method.title ORDER BY methodcount DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $user_id);
    $stmt->execute();
    
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9]);
    
    $counter = 0;
    
    while ($stmt->fetch()) {
        $counter = $counter+1;
      ?>

    <div class="row">
          <div class="d-none d-lg-block col-1">
            <img src="<?php echo $data[8];?>" class="img-fluid noborder">
          </div>
          <div class="col-12 col-lg-11">
            
            
              <div class="row predictionrow" data-toggle="collapse" data-target="#collapse<?php echo $data[0]; ?>">
                <div class="col-10">
                <div class="row">
                  <div class="col-4 predictiontitle">
                    <?php echo $data[1]; ?>
                  </div>
                  <div class="col-8 methodtitle">
                    <?php echo $data[2];?>
                  </div>
                  <div class="col-12 dates small">
                    <i class="fas fa-calendar"></i> <span class="datefield"><?php echo $data[7];?></span>
                  </div>
                </div>
                </div>
                
          <div class="col-1 text-right">
          
            <?php
            
            if($data[6]){
                echo "<i class=\"fas fa-eye\"></i>";
            }
            else{
                echo "<i class=\"fas fa-eye-slash\"></i>";
            }
            
            ?>
          </div>
          
          <div class="counter col-1 text-right">
            <?php echo $data[9]; ?>
          </div>
          
          <div id="collapse<?php echo $data[0]; ?>" class="col-12 collapse">
              <div class="row">
                <?php echo $data[3]; ?>
              </div>
              <div class="row text-truncate">
                <nobr><i class="fab fa-github lab"></i> <a href="<?php echo $data[4]; ?>"> <?php echo $data[4]; ?> </a></nobr>
              </div>
              <div class="row text-truncate">
                <nobr><i class="fab fa-google lab"></i> <a href="<?php echo $data[5]; ?>"> <?php echo $data[5]; ?> </a></nobr>
              </div>
          </div>
        </div>
        </div>
    </div>
      <?php
    }
    $stmt->close();

    
?>