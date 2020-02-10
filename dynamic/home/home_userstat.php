<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    if (strpos(getcwd(), 'home') !== false) {
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
    
    if(isset($_SESSION["userid"])){
      $userid = $_SESSION["userid"];
      echo "<input id =\"huserid\" type=\"hidden\" value=\"".$userid."\">";
?>

<style>
  .h-100{
    cursor: pointer;
  }
  .userstatrow{
    margin-bottom: 50px;
  }
</style>

<!-- Content Row -->
<div class="row userstatrow">

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2" onclick="navi('message')">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Contacts</div>
            

<?php
    $sql="SELECT COUNT(DISTINCT connection_id)
          FROM connections 
          WHERE user_id=? AND approved=1";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0]);
    
    while ($stmt->fetch()) {
      echo "<div class=\"h5 mb-0 font-weight-bold text-gray-800\"><span class=\"count\">".$data[0]."</span> Friends</div>";
    }
    $stmt->close();
?>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Following | Followers</div>
<?php
    $sql="SELECT COUNT( DISTINCT follow)
          FROM follow 
          WHERE userid=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0]);
    
    $stmt->fetch();
    $following = $data[0];
    $stmt->close();
    
    $sql="SELECT COUNT( DISTINCT userid)
          FROM follow 
          WHERE follow=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0]);
    
    $stmt->fetch();
    $followed = $data[0];
    $stmt->close();
    
    echo "<div class=\"h5 mb-0 font-weight-bold text-gray-800\"><span class=\"count\">".$following."</span> | <span class=\"count\">".$followed."</span></div>";
?>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Submitted Predictions</div>

<?php
    $sql="SELECT SUM(size)
          FROM prediction 
          WHERE userid=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($data[0]);
    
    while ($stmt->fetch()) {
      echo "<div class=\"h5 mb-0 font-weight-bold text-gray-800\"><span class=\"count\">".$data[0]."</span></div>";
    }
    $stmt->close();
?>

          </div>
          <div class="col-auto">
            <i class="fas fa-globe fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reproducibility</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">78%</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-star fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>

<?php
  }
?>