
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

<link rel="stylesheet" href="css/style.css">

<div class="row">
    <div class="col-12">
      <div class="tabs-menu">
        <input type="radio" id="tab1" name="tab-control">
        <input type="radio" id="tab2" name="tab-control" checked>
        <input type="radio" id="tab3" name="tab-control">
        <ul class="ullist">
          <li title="Methods" class="menuli"> <label for="tab1" role="button"><i class="fas fa-chart-area"></i> <span>Methods</span></label></li>
          <li title="Predictions" class="menuli"><label for="tab2" role="button"><i class="fas fa-lightbulb"></i> <span>Predictions</span></label></li>
          <li title="Datasets" class="menuli"><label for="tab3" role="button"><i class="fas fa-database"></i> <span>Datasets</span></label></li>
        </ul>
        <div class="slider">
            <div class="indicator"></div>
        </div>
        
        <div class="content content-sub">
          <section>
            <h2>Methods</h2>
            <?php include "submission/methods.php"; ?>
          </section>
          <section>
            <h2>Predictions</h2>
            <?php include "submission/predictions.php"; ?>
          </section>
          <section>
            <h2>Datasets</h2>
            <?php include "submission/datasets.php"; ?>
          </section>
        </div>
        
    </div>
  </div>
</div>
