<style>
  .featured{
    background-color: #edf2e6;
    margin-left: -50px;
    margin-right: -50px;
    margin-bottom: -20px;
    padding-bottom: 20px;
  }
  .highlight{
    padding: 50px;
  }
  .row.vertical-divider {
    overflow: hidden;
  }
  .row.vertical-divider > div[class^="col-"] {
    
    padding-bottom: 100px;
    margin-bottom: -100px;
    padding-top: 30px;
    border-left: 3px solid #d7dece;
    border-right: 3px solid #d7dece;
  }
  .feature-img{
    max-width: 250px;
    text-align: center;
  }
  .feature-img-geneshot{
    max-width: 150px;
  }
  
   @media (max-width:775px) {
        .row.vertical-divider > div[class^="col-"] {
            border-left: 0px solid #cdd4c3;
            border-right: 0px solid #cdd4c3;
        }
        
  }
  
  .row.vertical-divider div[class^="col-"]:first-child {
    border-left: none;
  }
  .row.vertical-divider div[class^="col-"]:last-child {
    border-right: none;
  }
</style>


<div class="row vertical-divider featured">
  <div class="col-md-6 col-sm-12 highlight">
    
    <div class="img-fluid feature-img">
      <?php include 'pharosanime.php'; ?>
    </div>
    <p>
      Pharos is the user interface to the Knowledge Management Center (KMC) for the Illuminating the Druggable Genome (IDG) program funded by the National Institutes of Health (NIH) Common Fund. (Grant No. 1U24CA224370-01). The goal of KMC is to develop a comprehensive, integrated knowledge-base for the Druggable Genome (DG) to illuminate the uncharacterized and/or poorly annotated portion of the DG, focusing on three of the most commonly drug-targeted protein families.
    </p>
    <a target="_blank" rel="nofollow" href="https://pharos.nih.gov/">Browse genes on Pharos &rarr;</a>
  </div>
  

    <div class="col-md-6 col-sm-12 highlight">
      <div class="">
        <img class="feature-img-geneshot img-fluid img-max-md px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://amp.pharm.mssm.edu/geneshot/images/targetArrow.png" alt="">
      </div>
      <p>
        Submit any search terms to Geneshot to receive prioritized genes that are most relevant to the search terms. Geneshot finds publications that mention both the search terms and genes. It then prioritizes these genes using various methods: 1) list of genes from publications; 2) predicted genes using gene-gene similarity matrices derived from a variety of resources.
      </p>
      <a target="_blank" rel="nofollow" href="https://pharos.nih.gov/">Visit Geneshot &rarr;</a>
  </div>
</div>