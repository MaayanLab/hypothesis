
<?php require 'dynamic/dbconfig.php'; ?>

<style>
    #content{
        padding: 0px;
    }
    .nav-link{
        color: grey !important;
        font-weight: 200;
        font-size: 18px;
    }
    .dropdown-menu{
        margin-top: -5px;
        padding: 20px;
        width: 200px !important;
        font-weight: 800;
        font-size: 16px !important;
        color: grey !important;
    }
    #navbarSupportedContentHeader{
        
    }
    #navbarSupportedContent{
        position: relative;
        top:0px;
        z-index: 1;
        background-color: white;
        margin: 0px;
        padding: 0px !important;
        border-radius: 5px;
        margin-top: 0px;
    }
    @media (max-width:992px) {
        #navbarSupportedContent{
            border: 1px solid lightgrey;
            margin-top: 60px;
            left: -1px;
            right: 0px;
            padding: 40px !important;
            padding-top: 30px;
            
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
            background-color: white !important;
            position: absolute;
            border-radius: 0px;
        }
        #hypelogo{
            margin-right: 0px;
            margin-left: -14px;
            margin-top: -3px !important;
            float: left;
        }
        #navbarSupportedContentHeader{
            overflow: hidden;
        }
    }
    
    #hypelogo{
        margin-left: 0px;
        margin-top: 5px;
        margin-right: 14px;
        float: left;
    }
    
    .navbar{
        min-width: 450px;
        color: #1a2421 !important;
    }
    
    .nav-link{
        color: #1a2421 !important;
        font-weight: 200;
    }
    
    .nav-link:hover{
        color: #2345c2 !important;
        font-weight: 200;
    }
    
    .text-gray-600{
        color: #1a2421 !important;
        
    }
    
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-white topbar mb-4 static-top shadow">
  <div class="cc">
      <img src="images/hypelogo.png" width=64 id="hypelogo">
      <button id="sidebarToggleTop" class="btn btn-link d-lg-none rounded-circle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars fa-2x"></i>
      </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php include 'header/header_links.php'; ?>
    </div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include 'header/header_user.php'; ?>
  </div><!-- /.container-fluid -->
</nav>
