
<style>
    .new{
        margin-right: -15px;
        color: darkgrey;
        font-size: 24px;
    }
    .new:hover{
        color: black;
        cursor: pointer;
    }
    .new:active{
        font-weight: bold;
    }
    .cardinfo{
        height: 20px;
    }
    
    #methodview{
        overflow-y: auto;
        max-height: 100%;
    }
    
</style>


<div class="col-12 sm-nopad">

<div class="col-12 text-right">
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#methodModal">
      <h6 class="new"><i class="fas fa-plus"></i> Add method</h6>
    </a>
</div>

<div class="card-body sm-smallpad">
    <div class="row">
        <div class="col-12" id="methodview">
            <?php include "listmethods.php"; ?>
        </div>
    </div>
</div>
</div>

<?php include 'methodmodal.php';?>
<?php include 'updatemethodmodal.php';?>
