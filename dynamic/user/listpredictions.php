
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
      padding-top: 16px;
      padding-bottom: 16px;
      border-top: 1px solid lightgrey;
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
        
        predictions = [];
        for(var i = 0; i < lines.length; i++){
            var sp = lines[i].split(",");
            obj = {};
            obj["gene"] = sp[0];
            obj["property"] = sp[1];
            obj["score"] = parseFloat(sp[2]);
            predictions.push(obj);
        }
        
        data["predictions"] = predictions;
        
        console.log(data);
        
        $.ajax({
           type: "POST",
           url: 'dynamic/api/predict.php',
           data: data,
           success: function(res){
             console.log(res);
           }
        });
    }
    
</script>


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
      ?>
      
    </div>
</div>











