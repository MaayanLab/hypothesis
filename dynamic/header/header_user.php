
<!-- Nav Item - User Information -->


<style>
  .login_link:hover{
    text-decoration: none;
    font-weight: bold !important;
    color: black !important;
  }
  .nofold{
    position: absolute;
    right: 10px;
    top: 0px;
    z-index: 6;
    flex-direction: row !important;
    width: 300px !important;
    max-width: 300px !important;
    
  }
  .dropdown-list{
    right: 10px !important;
    position: absolute !important;
    top: 70px !important;
    
  }
  
  .image-cropper {
      width: 50px;
      height: 50px;
      position: relative;
      overflow: hidden;
      border-radius: 50%;
      text-align: center;
  }
  .profile-pic {
    display: inline;
    margin: 0 auto;
    margin-left: 0%; //centers the image
    
    width: auto;
  }
  .float-right{
    position: absolute;
    float: right;
  }
  .pad-left-login{
    margin-left: 190px;
  }
</style>

<ul class="navbar-nav ml-auto nofold text-right">


<?php
  
  //$username = $_SESSION["username"];
  $username = "";
  
  if(isset($_SESSION["username"])){
      $username = $_SESSION["username"];
?>



<?php include 'header_alerts.php'; ?>
<?php include 'header_messages.php'; ?>

<div class="topbar-divider"></div>

<input type="hidden" id="ue" value="<?php echo $_SESSION["email"]; ?>">
<input type="hidden" id="up" value="<?php echo $_SESSION["pass"]; ?>">

<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 text-gray-600 small"><?php echo $_SESSION["username"]; ?></span>
    
    <div class="image-cropper">
      <img src="<?php echo $_SESSION["profilepic"]; ?>" width=50 class="profile-pic">
    </div>
    
    <!-- <img class="img-profile rounded-circle" src="<?php echo $_SESSION["profilepic"]; ?>"> -->
  </a>
  <!-- Dropdown - User Information -->
  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="index.php?nav=userview&u=<?php echo $_SESSION["userid"]; ?>">
      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
      Profile
    </a>
    <a class="dropdown-item" href="#">
      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
      Settings
    </a>
    <a class="dropdown-item" href="#">
      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
      Activity Log
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
      Logout
    </a>
  </div>
</li>

<?php
  }
  else{
    ?>
    
      <li class="nav-item dropdown no-arrow pad-left-login">
      <a class="nav-link login_link" href="login.html" id="userDropdown">
        <span class="mr-2 text-gray-600 small">Login</span>
        
        <div class="image-cropper">
          <img width=50 height=50 class="profile-pic" src="images/loginicon.png">
        </div>
        
        <!-- <img class="img-profile rounded-circle" src="<?php echo $_SESSION["profilepic"]; ?>"> -->
      </a>
    
    </li>

    <?php
  }
?>

</ul>