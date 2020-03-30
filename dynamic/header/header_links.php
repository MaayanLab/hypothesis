<style>
  .menuicon{
    margin-top: -4px;
    padding-right: 16px;
  }
  .innerdrop{
    position: relative !important;
    font-weight: 200 !important;
    font-size: 26px !important;
    border: 0px solid white !important;
  }
  #headslider{
    margin-top: -12px;
  }
  .headlist{
    margin-top: 16px;
  }
  
  .navbar-light .navbar-nav .active::after {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      content: " ";
      border-bottom: 6px solid #558df7;
      
      -webkit-transition : border 500ms ease-out;
      -moz-transition : border 500ms ease-out;
      -o-transition : border 500ms ease-out;
      transition : border 500ms ease-out;
  }
  .navbar-nav > li {
    float: left;
    position: relative;
  }
  .navbar-light .navbar-nav .active a::after {
    content: " ";
    left: 0;
    right: 0;
  }
  .dropdown-header{
    background-color: #558df7 !important;
  }
  .menuheader{
    display: none;
    background-color: #558df7;
    color: white;
    font-size: 12px;
    font-weight: 400;
    padding: 12px 40px;
    margin-left: -51px;
    margin-top: -40px;
    position: absolute;
    width: 260px;
    
    font-weight: 800;
    font-size: 0.65rem;
    
  }
  @media (max-width:992px) {
    .navbar-light .navbar-nav .active::after {
      border-bottom: none;
    }
    .menuheader{
      display: inline;
    }
    #navbarSupportedContent{
      overflow: hidden;
    }
  }
</style>

<div class="menuheader">PAGES</div>
<ul class="navbar-nav ml-auto">
    <li id="home_link" class="nav-item">
      <a class="nav-underline nav-link" href="index.php"> <i class="menuicon fas fa-home d-lg-none"></i>Home</a>
    </li>
    <?php
      if(isset($_SESSION["username"])){
    ?>
    <li id="submissions_link" class="nav-item">
      <a class="nav-underline nav-link" href="index.php?nav=submissions"><i class="menuicon fas fa-share-square d-lg-none"></i>Submissions</a>
    </li>
    <li id="message_link" class="nav-item">
      <a class="nav-underline nav-link" href="index.php?nav=message"><i class="menuicon fas fa-envelope-open-text d-lg-none"></i>Messages</a>
    </li>

    <?php
      }
    ?>
    <li id="prediction_link" class="nav-item">
      <a class="nav-underline nav-link" href="index.php?nav=prediction&domain=phenotype"><i class="menuicon fas fa-chart-area d-lg-none"></i></i>Predictions</a>
    </li>
</ul>
