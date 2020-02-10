<style>
  .plainheader{
    padding-top: 30px;
    font-weight: 120;
    font-size: 30px;
    color: grey;
  }
  .pad-vertical-idg{
    padding-top: 0px;
    padding-bottom: 10px;
  }
  .impc-info{
    padding: 80px 20px;
  }
  .float-left{
    float: left;
    padding: 10px 30px 20px 0px;
  }

  #impc_svg{
      width: 100%;
      max-width: 450px;
  }
  
  @media only screen and (max-width: 768px) {
    .impcont{
      width: 100%;
      text-align: center;
    }
    #impc_svg{
      max-width: 300px;
    }
  }
  
  .idg-info{
    margin-top: 10px;
    margin-bottom: 40px;
  }
  
  .funding{
    margin-top: 0px;
    margin-bottom: 60px;
  }
  
  .idea-img{
    margin-top: 60px;
  }
  
  
  .cssanimation, .cssanimation span {
      animation-duration: 0.9s;
      animation-fill-mode: both;
  }

  .cssanimation span { display: inline-block }

  .fadeInBottom { animation-name: fadeInBottom }
  @keyframes fadeInBottom {
      from {
          opacity: 0;
          transform: translateY(30%);
      }
      to { opacity: 1 }
  }
  

</style>


          <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-10">
              <h1 class="h3 text-gray-800">IDG Hypothesis Page for Computational Predictions of Mouse Phenotypes</h1>
            </div>
            <div class="col-3 d-md-inline-block d-none" style="padding-top: 4px;">
              <marquee scrollamount="1">
                Join in sharing your predictions of gene functions with the world!
              </marquee>
            </div>
            <div class="col-2 d-sm-inline-block text-right">
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><nobr><i class="fas fa-download fa-sm text-white-50"></i> Report</nobr></a>
            </div>
          </div>
          
          <br>
          
          
          <?php include 'home/home_userstat.php'; ?>
          
          <!-- Content Row -->
          
          <div class="row idg-info">
            <div class="col-12 d-md-none text-center">
              <a class="ascroll" href="#gene-info-anchor">
                <img src="https://commonfund.nih.gov/sites/default/files/IDG_LOGO_UPRIGHT_0.png" class="img-fluid img-max float-center">
              </a>
            </div>
            <div class="col-12 col-md-8">
              The <a href="https://commonfund.nih.gov/IDG">Illuminating the Druggable Genome Project (IDG)</a> Hypothesis Page (Hype!) was designed to provide the community with a platform to share machine learning models that predict gene-phenotype associations. The initial challenge presented by Hype! is a collaboration between IDG and the <a href="https://www.mousephenotype.org/">International Mouse Phenotyping Consortium (IMPC)</a> for predicting mouse knockout phenotypes. IMPC shared with IDG a list of 700 genes that are currently being phenotyped or about to be phenotyped soon. The challenge is to use machine learning approaches to predict the outcome of these phenotyping efforts before the results are published. The Hypothesis Page platform provides access to view and submit computational predictions about knockout mouse phenotypes. These predictions will be evaluated based on existing and future knockout mice data collected by IMPC. This initial challenge is in alignment with the goals of IDG, which are to illuminate knowledge about understudied genes from the druggable protein families to accelerate the identification of novel drug targets and therapies.
              <a class="ascroll" href="#gene-info-anchor">More info &rarr;</a>
            </div>
            <div class="col-4 d-none d-md-block">
                <img src="https://commonfund.nih.gov/sites/default/files/IDG_LOGO_UPRIGHT_0.png" class="img-fluid img-max">
            </div>
          </div>
          
          
          <div class="row funding">
            <div class="col-3 d-none d-md-block">
                <img src="images/idea.svg" class="idea-img img-fluid img-max cssanimation sequence fadeInBottom">
            </div>
            
            <div class="col-lg-9 col-md-9 col-sm-12">
          <p class="plainheader">Want to apply for funding to explore these predictions?</p>
          
          <p><a href="https://grants.nih.gov/grants/guide/pa-files/par-17-465.html" target="_blank"><b>NIH/NCATS New Therapeutic Uses Program: Bench Testing Therapeutic/Indication Pairing Strategies (UG3/UH3)</b></a></p>
          This Funding Opportunity Announcement (FOA) invites applications for support of pre-clinical studies to repurpose existing experimental or FDA approved drugs or biologics (existing therapeutics) that have already begun or completed at least a Phase l trial.
          The hypothesis for proposed studies must be developed using innovative processes to identify the therapeutic/indication pair. <br><br>
          Examples include independent crowdsourcing strategies (e.g., <a  target="_blank" href="https://www.ncats.nih.gov/ntu/assets/current">https://www.ncats.nih.gov/ntu/assets/current</a>,
          <a href="https://openinnovation.astrazeneca.com" target="_blank">https://openinnovation.astrazeneca.com</a>, or any website that lists experimental therapies),
          or use of computational algorithms. 
          
          <a href="https://grants.nih.gov/grants/guide/pa-files/par-17-465.html" target="_blank">https://grants.nih.gov/grants/guide/pa-files/par-17-465.html &rarr;</a>
            </div>
          </div>
          
          
          <?php include 'home/home_sitestat.php'; ?>

          <?php include 'home/leaderboard.php'; ?>

          
           <div id="gene-info-anchor" class="row pad-vertical-idg">
            <div class="col-xl-12 col-lg-12">
              <p>
                <p class="plainheader">About the Illuminating the Druggable Genome Project</p>
              </p>
                  <div class="row">
                    <div class="col-xl-8 col-md-8">
                    <p>
                    Approximately 3,000 genes are considered part of the “druggable genome,” a set of genes encoding proteins that scientists can or predict they can modulate using experimental small molecule compounds. Yet the existing clinical pharmacopeia is represented by only a few hundred targets, leaving a huge swath of biology that remains unexploited.  Therefore, a large number of proteins remain for scientists to be explored as potential therapeutic targets. Much of the druggable genome encodes three key protein families: <b>non-olfactory G-protein-coupled receptors (GPCRs)</b>, <b>ion channels</b> and <b>protein kinases</b>. Researchers lack crucial knowledge about the function of many proteins from these families and their roles in health and disease. Better understanding of how these proteins work could shed light on new avenues of investigation for basic science and therapeutic discovery.
                    <a href="https://ncats.nih.gov/idg">NCATS IDG Project Page &rarr;</a>
                    </p>
                  </div>
                  <div class="col-xl-4 col-md-4 text-center">
                    <a href="https://commonfund.nih.gov/IDG">
                      <img src="https://commonfund.nih.gov/sites/default/files/IDG_LOGO_UPRIGHT_0.png" class="img-fluid img-max">
                    </a>
                  </div>
                  </div>
            </div>
          </div>
          

          <?php include 'home/home_genefamilies.php'; ?>
<!--
          <div class="row impc-info">
            
            <div class="col-12">
              <div class="float-left impcont">
              <?php include 'home/impcanime.php'; ?>
            </div>
              The <b>International Mouse Phenotyping Consortium (IMPC)</b> is an international effort by 19 research institutions to identify the function of every protein-coding gene in the mouse genome.
              The entire genome of many species has now been published and whole genome sequencing is becoming relatively quick and cheap to complete. Despite these advancements the function of the majority of genes remains unknown.
              <b>The IMPC’s mission is to fill this knowledge gap and create a comprehensive catalogue of mammalian gene function that is freely available for researchers.</b>
              To achieve this, the IMPC is systematically switching off or ‘knocking out’ each of the roughly 20,000 genes that make up the mouse genome. Subsequently, the knock out mice undergo standardised physiological tests (phenotyping tests) across a range of biological systems in order to infer gene function, before the data is made freely available.
              <a href="https://www.mousephenotype.org/">IMPC Project Page &rarr;</a>
            </div>
          </div>
          
-->
          <?php include 'home/home_highlights.php'; ?>
          
          </div>
        </div>
      </div>
      
      
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>