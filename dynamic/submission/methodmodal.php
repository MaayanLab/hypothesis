<!-- Logout Modal-->

<style>

.modal-content {
  height: 100%; /* = 100% of the .modal-dialog block */
}
.descfield{
    height: 150px;
}

.textf{
    min-width: 97%;
    min-height: 120px;
    max-height: 120px;
    height: 120px !important;
    overflow-y: scroll;
}

.toppad{
    margin-top: 60px;
}

.checkbox-menu li label {
    display: block;
    padding: 3px 10px;
    clear: both;
    font-weight: normal;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
    margin:0;
    transition: background-color .4s ease;
}
.checkbox-menu li input {
    margin: 0px 5px;
    top: 2px;
    position: relative;
}

.checkbox-menu li.active label {
    background-color: #cbcbff;
    font-weight:bold;
}

.checkbox-menu li label:hover,
.checkbox-menu li label:focus {
    background-color: #f5f5f5;
}

.checkbox-menu li.active label:hover,
.checkbox-menu li.active label:focus {
    background-color: #b8b8ff;
}

.tagrow{
    padding-bottom: 10px;
}

.tag_filter{
    margin-right: 3px;
    margin-bottom: 3px;
}

#outputimg{
  margin-top: 5px;
  padding: 12px;
  padding-top: 0px;
}

#imgpreview{
  width: 100%;
  margin-bottom: 10px;
}

.imgpane{
  border-right: 1px solid grey;
}

</style>

<div class="modal fade" id="methodModal" tabindex="-1" role="dialog" aria-labelledby="exampleMethodLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleMethodLabel">Create Method</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
    <div class="row">
      <div class="col-4 imgpane">
        <!--<img src="images/idea.svg" class="img-fluid toppad">-->
        <br>
        
        <div id="outputimg"></div>
        
        <div class="custom-file">
          <input id="method-img" type="file" class="custom-file-input s3upload" aria-describedby="inputGroupFileAddon01" onchange="previewImage(this, 'outputimg');">
          <label class="custom-file-label" for="method-img">Choose File</label>
        </div>
        
      </div>
      <div class="col-8">
        <br>
            Please consider adding as much information as possible to maximize reusability.
        <br><br>

<form>
  <input id="userid" type="hidden" value="<?php echo $userid; ?>">
  <div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label">Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="title" placeholder="Method name">
    </div>
  </div>
  <div class="form-group row">
    <label for="desc" class="col-sm-4 col-form-label">Subtitle</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="subtitle" placeholder="Short Description">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="github" class="col-sm-4 col-form-label"><i class="fab fa-github"></i> GitHub</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="github" placeholder="URL">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="github" class="col-sm-4 col-form-label"><i class="fab fa-google"></i> Colab</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="colab" placeholder="URL">
    </div>
  </div>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-5 pt-0">Accessibility</legend>
      <div class="col-sm-7">
        <div class="row">
            <div class="col-4 form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="access1" value="private" checked>
              <label class="form-check-label" for="gridRadios1">
                Private
              </label>
            </div>
            <div class="col-4 form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="access2" value="public">
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
                    
                        include "sharefriend.php"; 
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
    <div class="col-12"">
        
        <div class="tags tag-basic">
          <div class="filter-nav">
            <div class="row tag_title">
            <div class="col-4">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-0 my-0 my-md-0 mw-100" onsubmit="return addtag()" >
                <div class="input-group message_filter">
                  <input type="text" class="form-control bg-light border-0 message_filter" id="tagtext" placeholder="Add Tag" aria-label="filter" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary btn-sm message_filter" type="button" onclick="addtag()">
                      <i class="fas fa-tags"></i>
                    </button>
                  </div>
                </div>
            </form>
            </div>
            
            <div class="col-8" id="tag_list">
                
            </div>
        </div>
      </div>
    </div>
</div>
</div>

<div class="row">
    
    <div class="col-12 descfield"">
        <label>Description</label>
        <textarea id="description" class="form-control textf" rows="10" placeholder="Add some information"></textarea>
    </div>

</div>
<div class="row">
    <div class="col-12 text-right">
        <br>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        
        <button id="" target="method-img" class="btn btn-primary s3btn" after="createmethod();">Create Method</button>
        
    </div>
</div>

</div>
</div>

</div>
</div>

<script>
$(".checkbox-menu").on("change", "input[type='checkbox']", function() {
   $(this).closest("li").toggleClass("active", this.checked);
});

$(document).on('click', '.allow-focus', function (e) {
  e.stopPropagation();
});
</script>