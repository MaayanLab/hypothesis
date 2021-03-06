
<style>
  .twitterbox{
    padding: 5px;
    padding-right: 3px;
    padding-bottom: 0px;
  }
</style>

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-7 col-lg-7 col-md-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Submitted Predictions</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Feature coming soon</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  
  <div class="col-xl-5 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-6" style="height: 20px;">
              <h6 class="m-0 font-weight-bold text-primary">@DruggableGenome</h6>
            </div>
            <div class="col-6 text-right" style="padding-right: 40px;">
              <i class="fas fa-lg fa-robot text-gray-500" style="position: absolute;"></i>
            </div>
          </div>
        </div>
        <div class="card-body twitterbox">
          <a class="twitter-timeline" data-width="100%" data-height="347" href="https://twitter.com/DruggableGenome">Tweets by DruggableGenome</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>

</div>