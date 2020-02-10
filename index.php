<!DOCTYPE html>
<html lang="en">

<head>

  <?php session_start(); ?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Hype is a website for the aggregation of gene predictions. Predictions are performed by third parties and are automatically validated. The quality of the predictions and proper documentation are responsibility of the creators.">
  <meta name="author" content="Alexander Lachmann">
  
  <link rel="icon" href="images/hypelogo.png">
  
  <title>Hype</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  
  <link href="css/bootstrap-tagsinput.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>



  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
    
  <script src="js/s3upload.js"></script>
  <script src="js/uploadextra.js"></script>

  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="css/select.dataTables.min.css">
  <link rel="stylesheet" href="css/buttons.dataTables.min.css">
  
  <link rel="stylesheet" href="css/bootstrap.min.413.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

  <style>
    body{
        font-family: Campor, SegoeUI, 'Segoe UI', "Open Sans",Helvetica;
    }
    
    .Site {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }

      .Site-content {
        flex: 1;
      }

      .content {
          padding: 0px 0px 0px 0px ;
          margin: 0px 0px 0px 0px;
      }
      
      @media (max-width: 1200px) {
        .container-fluid {
            height: 100% !important;
        }
      }
      
      #footer {
        background-color: #F8F8F8;
        border-top: 1px solid #E7E7E7;
        padding: 0px;
        padding-top: 20px;
        width: 100%;
        color: steelblue;
        
        font-size: 14px;
        text-align: center;
        height: 60px;
    }
    
    .btn{
        border-radius: 2px;
    }
    
    @media (max-width:1215px) {
        #footer {
            border-top: none;
        }
    }
    
    .form-control{
        border-radius: 3px !important;
        font-size: 14px;
    }
    .custom-file-input{
        border-radius: 2px !important;
    }
    .custom-file-label{
        border-radius: 2px !important;
    }
    .pad-vertical{
        padding-left: 10px;
        padding-top: 0px;
        padding-bottom: 60px;
    }
    
.bg-bubbles{
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events:none;
}

.bg-bubbles li{
    z-index: 1;
    
    position: absolute;
    
    display: block;
    width: 70px;
    height: 70px;
    
    bottom: -120px;
    opacity: 0;
    
    -webkit-animation: square 15s infinite;
    animation:         square 15s infinite;
    
    background-color: rgba(255, 255, 255, 0.2);
    
    color: white;
    
    -webkit-transition-timing-function: linear;
    transition-timing-function: linear;
    
    left: 10%;
}

.bg-bubbles li:nth-child(2){
    left: 8%;
    width: 30px;
    height: 30px;
    animation-delay: 3s;
    background-color: rgba(255, 255, 255, 0.3);
}

.bg-bubbles li:nth-child(3){
    left: 5%;
    width: 120px;
    height: 120px;
    animation-delay: 15s;
    background-color: rgba(255, 255, 255, 0.4);
    animation-duration: 19s;
}

.bg-bubbles li:nth-child(4){
    left: 91%;
    width: 80px;
    height: 80px;
    animation-delay: 5s;
    background-color: rgba(255, 255, 255, 0.3);
    animation-duration: 16s;
}

.bg-bubbles li:nth-child(5){
    left: 12%;
    width: 100px;
    height: 100px;
    animation-delay: 9s;
    animation-duration: 12s;
}

.bg-bubbles li:nth-child(6){
    left: 92%;
    width: 170px;
    height: 170px;
    animation-delay: 4s;
    background-color: rgba(255, 255, 255, 0.3);
    animation-duration: 14s;
}


.bg-bubbles li:nth-child(7){
    left: 96%;
    width: 40px;
    height: 40px;
    animation-delay: 8s;
}

.bg-bubbles li:nth-child(8){
    left: 0%;
    width: 90px;
    height: 90px;
    animation-delay: 4s;
    animation-duration: 18s;
    background-color: rgba(255, 255, 255, 0.4);
}

.bg-bubbles li:nth-child(9){
    left: 6%;
    width: 70px;
    height: 70px;
    animation-delay: 10s;
    animation-duration: 18s;
}

.bg-bubbles li:nth-child(7){
    left: 94%;
    width: 50px;
    height: 50px;
    animation-delay: 3s;
}

.bg-bubbles li:nth-child(8){
    left: 2%;
    width: 90px;
    height: 90px;
    animation-delay: 4s;
    animation-duration: 18s;
    background-color: rgba(255, 255, 255, 0.4);
}

.bg-bubbles li:nth-child(9){
    left: 8%;
    width: 70px;
    height: 70px;
    animation-delay: 17s;
    animation-duration: 12s;
}

.green{
    background-color: green !important;
}

.blue{
    background-color: lightblue;
}

.card{
    border-radius: 2px;
}

    @-webkit-keyframes square {
      0%   { transform: translateY(200); opacity: 0;}
      10%  {opacity: 1;}
      80%  {opacity: 0;}
      100% { transform: translateY(-800px) rotate(200deg); opacity: 0;}
    }
    @keyframes square {
      0%   { transform: translateY(200); opacity: 1;}
      10%  {opacity: 1;}
      80%  {opacity: 0;}
      100% { transform: translateY(-800px) rotate(200deg); opacity: 0;}
    }

    .img-max {
      width:100%;
      max-width: 300px;
    }
    .img-max-lg {
      width:100%;
      max-width: 400px;
    }
    .img-max-md {
      width:100%;
      max-width: 200px;
    }
    .leader {
      position: absolute;
      top: -17px;
      left: 12px;
      width: 32px;
      transform: rotate(-10deg);
    }
    .container-fluid{
        background-color: #ffffff;
        padding: 50px;
        border: 0px solid #888888;
        margin-right: auto !important;
        margin-left: auto !important;
        max-width: 1200px !important; /* or 950px */
        
        margin-bottom: 24px;
        
    }
    #content{
        background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%) !important;
    }
    
    @media (max-width:1260px) {
        .container-fluid{
            margin-top: -24px;
            width: 100%;
            max-width: 1300px;
            margin-bottom: 0px;
        }
        
    }
    
    @media (max-width:700px) {
        .container-fluid{
            padding: 20px;
        }
    }
    
    @media (max-width:700px) {
        .sm-nopad{
            padding: 0px !important;
        }
        .sm-smallpad{
            padding: 5px !important;
        }
    }
    
    .form-control{
        border-radius: 2px !important;
    }
    
    .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: grey;
      opacity: 0.5; /* Firefox */
    }
    
    .dropdown-toggle::after{
        margin-top: -22px;
    }
  </style>

</head>

<body id="page-top" class="Site">

  <!-- Page Wrapper -->
  <!--<div id="wrapper"> -->
    
    <?php //include 'dynamic/sidebar.php';?>
    
    <!-- Content Wrapper -->
    <!--<div id="content-wrapper" class="d-flex flex-column">-->
      <!-- Main Content -->
      <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

      <div id="content" class="content Site-content">
        
        <?php include 'dynamic/header.php';?>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div id="maincontent">
                <?php
                    if(isset($_GET["nav"])){
                        include 'dynamic/'.$_GET["nav"].'.php';
                    }
                    else{
                        include 'dynamic/home.php';
                    }
                ?>
            </div>
        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->
      
      <?php include 'dynamic/footer.php';?>
    
    <!--</div>-->
    
    <!-- End of Content Wrapper -->
  <!--</div>-->
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <?php include 'dynamic/logout.php';?>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


  <script src="js/navigate.js"></script>
  <script src="js/message.js"></script>
  <script src="js/credentials.js"></script>
  <script src="js/submission.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jqueryform.js"></script>
  <script src="js/fixdate.js"></script>

  <script src="js/colorextract.js"></script>
  <script src="js/d3_v5.js"></script>
</body>

</html>
