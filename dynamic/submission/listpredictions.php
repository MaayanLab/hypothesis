
<style>
    .custom-file-input:hover{
        cursor: pointer !important;
    }
    .custom-file:hover{
        cursor: pointer !important;
    }
    
    .counts{
      font-size: 26px;
      color: orange;
      font-weight: bold;
      margin-top: -5px;
    }
    
    .predictionrow{
      padding-top: 20px;
      padding-bottom: 30px;
      border-top: 1px solid lightgrey;
      border-left: 3px solid transparent;
      cursor: pointer;
    }
    
    .predictionrow:hover{
      border-left: 3px solid dodgerblue;
      margin-left: -15px;
    }
    
    .predictiontitle{
      font-size: 16px;
      font-weight: bold;
    }
    
    .methodtitle{
      font-size: 16px;
    }
    
    .nav-link.active{
      font-weight: bold;
    }
    
    #output{
      padding-top: 23px;
    }
    
    .notchup{
      margin-top: -20px !important;
    }
    
</style>

<script type="text/javascript">
    
    var lines = [];
    
    function sendJSON(){
        
        var data = {};
        data["method"] = $( "#methodselect option:selected" ).val();
        data["user"] = $("#huserid").val();
        data["title"] = $("#ptitle").val();
        data["pkey"] = $("#prediction_up").attr("upload-filename");
        predictions = [""];
        
        data["predictions"] = predictions;
        
        $.ajax({
           type: "POST",
           url: 'dynamic/api/predict.php',
           data: data,
           success: function(res){
             $("#predictionview").load("dynamic/submission/listpredictions.php");
           }
        });
    }
    
</script>


<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-4">
      
        <h7>Title</h7>
        <input type="text" placeholder="Prediction name" class="form-control" id="ptitle">
        <br>
        <h7>Prediction file (CSV)</h7>
        <div class="custom-file">
          <input id="prediction_up" upload-filename="<?php echo uniqid(); ?>" type="file" class="custom-file-input s3upload" aria-describedby="inputGroupFileAddon01" onchange="previewImage(this);">
          <label class="custom-file-label" for="prediction_up">Choose File</label>
        </div>
        <br>
<br>


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
    echo "<input id =\"huserid\" type=\"hidden\" value=\"".$userid."\">";
?>



<h7>Method</h7>
<select id="methodselect" class="browser-default custom-select">

<?php

    $sql="SELECT id, title FROM method WHERE author_id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1]);
    
    while ($stmt->fetch()) {
        ?>
        
        <option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
        
        <?php
    }

        ?>
        </select>
        
        <br><br>
        <button target="prediction_up" class="btn btn-primary s3btn" after="sendJSON();">Submit prediction</button>
        
    </div>
    <div id="output" class="col-sm col-md-5 col-lg-8 text-center">
      <div class="d-none d-md-inline-block notchup">
        <?php include "predictanimation.php"; ?>
      </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-12">
      
      <?php
        
          $sql="SELECT size, prediction.date, method.title, method_id, prediction.name 
                FROM prediction 
                INNER JOIN method 
                ON method_id=method.id WHERE userid=?";
          
          $stmt = $conn->prepare($sql);
          $stmt->bind_param('s', $userid);
          $stmt->execute();
          $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4]);
          
          while ($stmt->fetch()) {
              ?>
              
              <div class="row predictionrow">
                <div class="col-10">
                <div class="row">
                  <div class="col-4 predictiontitle">
                    <?php echo $data[4];?>
                  </div>
                  <div class="col-8 methodtitle">
                    <?php echo $data[2];?>
                  </div>
                  <div class="col-12 dates small">
                    <i class="fas fa-calendar"></i> <span class="datefield"><?php echo $data[1];?></span>
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
          
          $sql="SELECT size, prediction.date, method.title, method_id, prediction.name 
                FROM prediction 
                INNER JOIN method 
                ON method_id=method.id WHERE userid=?";
          
          $stmt = $conn->prepare($sql);
          $stmt->bind_param('s', $userid);
          $stmt->execute();
          $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4]);
          
          while ($stmt->fetch()) {
            
          }
      ?>
      
    </div>
</div>











