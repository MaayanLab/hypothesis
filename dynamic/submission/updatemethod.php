
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    session_start();
    require '../dbconfig.php';
    
    $method_id = $_POST["method_id"];
    $user_id = $_SESSION["userid"];
    $sql = "SELECT id, title, subtitle, description, giturl, colaburl, accessibility, image FROM method WHERE author_id=? AND id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $user_id, $method_id);
    $stmt->execute();
    
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
    
    $stmt->fetch();
    $stmt->close();
?>

<style>
  .methodimg{
    width: 240px;
  }
</style>

    <div class="row">
      <div class="col-4 imgpane">
        
        <br>
        
        <div class="methodimg" id="outputimgupdate"><img id="imgpreview" class="img-fluid preview" src="<?php echo $data[7]?>"></div>
        
        <div class="custom-file">
          <input id="method-update-img" type="file" class="custom-file-input s3upload s3uploadmethod" onchange="previewImage(this, 'outputimgupdate');">
          <label class="custom-file-label" for="method-update-img">Choose File</label>
        </div>
        
      </div>
      <div class="col-8">
        <br>
            Please consider adding as much information as possible to maximize reusability.
        <br><br>

<form>
  <div class="form-group row">
    <label for="utitle" class="col-sm-4 col-form-label">Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="utitle" placeholder="Method name" value="<?php echo $data[1]?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="usubtitle" class="col-sm-4 col-form-label">Subtitle</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="usubtitle" placeholder="Short Description" value="<?php echo $data[2]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="ugithub" class="col-sm-4 col-form-label"><i class="fab fa-github"></i> GitHub</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ugithub" placeholder="URL" value="<?php echo $data[4]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="ugithub" class="col-sm-4 col-form-label"><i class="fab fa-google"></i> Colab</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ucolab" placeholder="URL" value="<?php echo $data[5]?>">
    </div>
  </div>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-5 pt-0">Accessibility</legend>
      <div class="col-sm-7">
        <div class="row">
            <div class="col-4 form-check">
              <?php 
                if($data[6]){
                  echo '<input class="form-check-input" type="radio" name="gridRadios" id="uaccess1" value="private">';
                }
                else{
                  echo '<input class="form-check-input" type="radio" name="gridRadios" id="uaccess1" value="private" checked>';
                }
              ?>
              <label class="form-check-label" for="gridRadios1">
                Private
              </label>
            </div>
            <div class="col-4 form-check">
              <?php 
                if($data[6]){
                  echo '<input class="form-check-input" type="radio" name="gridRadios" id="uaccess2" value="public" checked>';
                }
                else{
                  echo '<input class="form-check-input" type="radio" name="gridRadios" id="uaccess2" value="public">';
                }
              ?>
              
              <label class="form-check-label" for="gridRadios2">
                Public
              </label>
            </div>
            
            <div class="col-4 form-check">
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" 
                          id="dropdownMenu1" data-toggle="dropdown" 
                          aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-user-friends"></i>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">
                  
                    <?php
                        include "updatesharefriend.php";
                    ?>
                    
                  </ul>
                </div>
            </div>
            
        </div>
        
      </div>
    </div>
  </fieldset>



</form>

</div>
</div>

<div class="row tagrow">
    <div class="col-12">
        
        <div class="tags tag-basic">
          <div class="filter-nav">
            <div class="row tag_title">
            <div class="col-4">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-0 my-0 my-md-0 mw-100" onsubmit="return uaddtag()" >
                <div class="input-group message_filter">
                  <input type="text" class="form-control bg-light border-0 message_filter" id="utagtext" placeholder="Add Tag" aria-label="filter" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary btn-sm message_filter" type="button" onclick="uaddtag()">
                      <i class="fas fa-tags"></i>
                    </button>
                  </div>
                </div>
            </form>
            </div>
            
            <div class="col-8" id="utag_list">
                
                
                <?php
              
              $sql = "SELECT DISTINCT tag FROM methodtags WHERE methodid=? AND status=1";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param('i', $method_id);
              $stmt->execute();
              
              $stmt->bind_result($data[0]);
              
              while($stmt->fetch()){
                
                ?>
                  <button class="btn btn-primary utag_filter removebtn" data-filter="<?php echo $data[0]; ?>"><?php echo $data[0]; ?></button>
                <?php
                
              }
              $stmt->close();
            
            ?>
                
                
            </div>
        </div>
      </div>
    </div>
</div>
</div>

<div class="row">
    
    <div class="col-12 descfield">
        <label>Description</label>
        <textarea id="udescription" class="form-control textf" rows="10" placeholder="Add some information"><?php echo $data[3]?></textarea>
    </div>

</div>
<div class="row">
    <div class="col-12 text-right">
        <br>
        <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="clearMethodUpdateForm()">Cancel</button>
        <button target="method-update-img" class="btn btn-primary s3btn updatemethodbtn" after="updatemethod(<?php echo $method_id; ?>)">Update Method</button>
    </div>
</div>

<script>
  
$('.updatemethodbtn').each(function() {
    $(this).click(function() { upload(this); });
});
$('.s3uploadmethod').each(function() {
    $(this).change(function() { updateLabel(this); });
});

</script>
