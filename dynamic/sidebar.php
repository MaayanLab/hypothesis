
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i>-->
          
          <img src="images/hypelogo.png" width=50 id="animation-target">
        </div>
        <div class="sidebar-brand-text mx-3">Hype <b>!</b></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Predictions
      </div>

      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePheno" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Phenotypes</span>
        </a>
        <div id="collapsePheno" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Phenotypes</h6>
            <a class="collapse-item" href="index.html">MGI Phenotype</a>
            <a class="collapse-item" href="index.html">Human Phenotype</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGO" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Gene Ontology</span>
        </a>
        <div id="collapseGO" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gene Ontology</h6>
            <a class="collapse-item" href="index.html">Biological Process</a>
            <a class="collapse-item" href="index.html">Molecular Function</a>
            <a class="collapse-item" href="index.html">Cellular Component</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePath" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pathways</span>
        </a>
        <div id="collapsePath" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pathways</h6>
            <a class="collapse-item" href="index.html">KEGG Pathways</a>
            <a class="collapse-item" href="index.html">WikiPathways</a>
          </div>
        </div>
      </li>
      
            <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        IDG Genes
      </div>

      
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="far fa-lightbulb"></i>
          <span>Ion Channels</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="far fa-lightbulb"></i>
          <span>Kinases</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="far fa-lightbulb"></i>
          <span>GCPRs</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

<?php
if(isset($_SESSION["userid"])){
?>

      <div class="sidebar-heading">
        User
      </div>

            <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?nav=submissions">
          <i class="fas fa-chart-area"></i>
          <span>Submissions</span></a>
      </li>


            <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" onclick="navi('message')" href="javascript:void(0);">
          <i class="fas fa-database"></i>
          <span>Your Datasets</span></a>
      </li>


            <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" onclick="navi('message')" href="index.php?nav=message">
          <i class="fas fa-users"></i>
          <span>Friends</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

<?php
}
?>

      <div class="sidebar-heading">
        Support
      </div>

                  <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-database"></i>
          <span>Public Datasets</span></a>
      </li>

            <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-info-circle"></i>
          <span>Documentation</span></a>
      </li>

            <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fab fa-youtube"></i>
          <span>YouTube tutorials</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-code"></i>
          <span>API</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->