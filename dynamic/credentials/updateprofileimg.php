
<style>
    .custom-file-input:hover{
        cursor: pointer !important;
    }
    .custom-file:hover{
        cursor: pointer !important;
    }
</style>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#imgpreview')
                .attr('src', e.target.result)
                .width(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<br><br>
<div class="row">
    <div class="col-4">


<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    if (strpos(getcwd(), 'credentials') !== false) {
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


<div class="input-group">
  <div class="custom-file">
    <input name="file" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange='readURL(this)'  accept="image/gif, image/jpeg, image/png">
    <label id="uploadlabel" class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>


<form>
<input id="uid" name="key" value="x" type="hidden">
<input id="cid" name="AWSAccessKeyId" value="x" type="hidden">
<input name="acl" value="private" type="hidden">
<input name="success_action_redirect" value="success.html" type="hidden">
<input id="policy" name="policy" value="x" type="hidden">
<input id="signature" name="signature" value="x" type="hidden">
<input name="Content-Type" value="application/octet-stream" type="hidden">

<div class="input-group">
  <div class="custom-file">
    <input name="file" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange='openFile(event)'>
    <label id="uploadlabel" class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>

<br><br>

<div id="prbar" class="progress" style="height: 30px; display: none;">
  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
</div>

<div id="submitbutton"></div>

</form>


    </div>
    <div id="output" class="col-8">
      <img id="imgpreview" src="#" alt="Preview" />
      
    </div>
</div>









<script src="js/uploaddata.js">





