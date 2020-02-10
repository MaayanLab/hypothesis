
<style>
  @media (min-width: @screen-md-min) {
        .min-pad .tab-pane{
            padding: 0px;
            margin-left: -40px;
            margin-right: -40px;
        }
    }
    .min-pad .tab-pane{
        margin-left: -40px;
            margin-right: -40px;
    }
</style>



<div class="row">
    <div class="col-12">
      <div> 
        <ul class="nav nav-tabs card-header-tabs pull-right" id="myTab" role="tablist">
          <li class="nav-item">
           <a class="nav-link active" id="method-tab" data-toggle="tab" href="#method" role="tab" aria-controls="method" aria-selected="true">Methods</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="prediction-tab" data-toggle="tab" href="#prediction" role="tab" aria-controls="prediction" aria-selected="false">Predictions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="false">Datasets</a>
          </li>
        </ul>
      </div>
      <div class="card-body min-pad">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="method" role="tabpanel" aria-labelledby="method-tab">
                 <?php include "submission/methods.php"; ?>
            </div>
            <div class="tab-pane fade" id="prediction" role="tabpanel" aria-labelledby="prediction-tab">
                <?php include "submission/predictions.php"; ?>
            </div>
            <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
                <?php include "submission/datasets.php"; ?>
            </div>
        </div>
      </div>
    </div>
</div>
