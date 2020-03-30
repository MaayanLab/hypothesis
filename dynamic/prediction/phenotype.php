

<style>
    .follower{
        text-align: center;
        min-width: 120px;
        float: left;
        font-size: 14px;
        margin-right: 16px;
    }
    .followrow{
        margin-bottom: 20px;
    }
    .predictionheader{
        margin-bottom: 50px;
    }
    .pintro{
        margin-bottom: 40px;
    }
    .timeline{
        max-width: 1000px;
        width: 100%;
        padding: 20px;
        
    }
    .timelinecontainer{
        text-align: center;
        padding-top: 40px;
    }
    .benchmarkicon{
        position: relative;
        margin-top: -20px;
        margin-left: 0px;
        margin-right: 30px;
    }
    .datestr{
        font-size: 12px;
    }
    .predictionrow{
        padding: 10px;
    }
    .score{
        font-size: 16px;
        color: orange;
        font-weight: 600;
    }
    .pretable td{
        padding: 6px 12px;
        
    }
    .pretable tr:hover td{
        color: #000;
        background-color: #eeeeee;
    }
    
    .pretable tr:hover td:first-child {
        border-left: 4px solid dodgerblue !important;
        padding-left: 12px !important;
    }
    .pretable tr:hover td:last-child {
        border-right: 4px solid dodgerblue !important;
        padding-right: 12px !important;
    }
    
    table{
        border: none !important;
        color: #4a4a4a !important;
    }
    
    th{
        font-size: 14px !important;
        border: none !important;
    }
    
    td{
        font-size: 14px;
        padding: 16px !important;
        border: none !important;
    }
    
    .pretable{
        width: 100% !important;
        border-spacing: 0px !important;
    }
    .paging_simple_numbers{
        position: absolute;
        float: right;
        right: 15px;
        bottom: 0px;
    }
    .paginate_button{
        padding: 5px 12px;
        
    }
    .paginate_button.active{
        background-color: rgba(90, 92, 105, 0.5);
        font-weight: 400;
        //border: 2px solid #0b6b46;
        border-radius: 2px;
    }
    .paginate_button.active a{
        color: white;
        font-weight: 600;
    }
    .aucimg{
        margin-top: 4px;
    }
    .datefield{
        font-size: 12px;
    }
    .topthree{
        
    }
    .topten{
        
    }
    
    .aucimg{
        float: right;
    }
    
    table {
        font-weight: 200px !important;
    }
    .d3content{
        height: 150px;
        margin-bottom: 30px;
        width: 100%;
    }
    #svg_bars{
        width: 100%;
        max-width: 1000px;
    }
    .toolTip {
      position: absolute;
      left: 200px;
      top: 500px;
      display: none;
      min-width: 80px;
      height: auto;
      background: none repeat scroll 0 0 #ffffff;
      border: 1px solid lightgrey;
      border-radius: 2px;
      padding: 14px;
      pointer-events: none;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .innerToolTip{
        animation: 0.6s ease-out 0s slideInFromRight;
    }
    
    .profile-pic{
        border-radius: 50%;
    }
    
    @keyframes slideInFromRight {
      0% {
        transform: translateX(30%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    .submitbtn{
        position: absolute;
        right: 15px;
        top: 0px;
    }
    
    .maxbtn{
        width: 100%;
        margin-top: 20px;
    }
    
    .odd{
        background-color: #fff !important;
    }
    .highdata{
        float: left;
        margin-right: 10px;
    }
    .datahighlights{
        margin: 15px;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15) !important;
    }
</style>


<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    if(!isset($_SESSION)){
      session_start();
    }
    
    $domain = $_GET["domain"];
    $title = "";
    
    if($domain == "phenotype"){
        $title = "Mouse Phenotype";
    }
    else if($domain == "pathway"){
        $title = "KEGG: Pathway";
    }
    else if($domain == "geneontology"){
        $title = "Gene Ontology: Biological Prosess";
    }
?>

<div class="row pintro">
    <div class="col-12">
    
        <h2 class="predictionheader"><img class="benchmarkicon" src="images/IMPC_logo.svg" width=180><?php echo $title;?> Predictions</h2>
            Encyclopaedia of phenotypes from knockout mice. The International Mouse Phenotyping Consortium (IMPC) is an international scientific endeavour to create and characterize the phenotype of 20,000 knockout mouse strains.
            The following predictions associate genes with phenotypes catalouged by the IMPC. <a href="https://www.mousephenotype.org/">https://www.mousephenotype.org/</a>
        <button type="button" class="btn btn-primary submitbtn d-none d-md-block" onclick="addphenotypeprediction()">+ Submit Prediction</button>
    
    </div>
    <div class="col-12 d-md-none"><button type="button" class="btn btn-primary maxbtn" onclick="addphenotypeprediction()">+ Submit Prediction</button></div>
    
    <div class="col-12">
        <br>
        <p>
            All submitted predictions will be evaluated on a regular basis. To assure that the benchmark is unbiased to prior knowloedge all submitted predictions will be validated against data published after the prediction submission. The IMPC will update phenotype screen information sporadically. The timeline below shows the expected release data for phenotype information of genes currently in the pipeline.
        </p>
        <br>
        <p>
            For a prediction to qualify for a benchmark it has to include at at least one gene for which phenotype data has been released after the prediction date timestamp. It also needs to cover sufficient predictions for a gene to achieve sufficient statistical power.

            While a prediction is not officially benchmarked it will be scored by existing prior data releases. Predictions with high scores in provisional benchmarks might be overfitting the existing data and are not qualitatively validated.
        </p>
    </div>
    
<div class="datahighlights">
<h2>Training Data Highlights</h2>
<p>These are example datafiles that can be used to make phenotype predictions. These datasets are meant to get you started, but models do not have to be restricted by them. Explore other prediction projects to get ideas which datasets to use or share your own data resources for others to use.</p>
<button type="button" class="btn btn-primary highdata d-none d-md-block" onclick="addphenotypeprediction()">MGI Mouse Phenotype GMT</button>
<button type="button" class="btn btn-primary highdata d-none d-md-block" onclick="addphenotypeprediction()">ARCHS4 co-expression</button>
<button type="button" class="btn btn-primary highdata d-none d-md-block" onclick="addphenotypeprediction()">Tagger gene co-occurrence</button>

</div>

    <div class="col-12 timelinecontainer">
        <h4>Upcoming IMPC data releases</h4>

        <?php include "dynamic/prediction/phenotimeline.php"; ?>
        
    </div>
</div>

<div class="row">
    <div class="col text-center">
        <div  id="d3content" class="d3content ">
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <table id='predicttable' class='table table-striped table-bordered compact pretable'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prediction</th>
                    <th>Creator</th>
                    <th>Date</th>
                    <th>Size</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>

<?php
    
    $sql="SELECT prediction.userid, prediction.name, prediction.date, prediction.size, user.username, user.profilepic, prediction.maxbench, prediction.predictionkey 
    FROM prediction INNER JOIN user ON prediction.userid=user.uid ORDER BY prediction.maxbench DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
    
    $counter = 0;
    while ($stmt->fetch()) {
        $counter = $counter +1;
        $data[6] = round(100*$data[6],4);
?>
    <tr onmouseenter="highlight(this);" onmouseleave="rmhighlight(this);" onclick="showhighlight(this);">
        <td class="ranktd">
            <?php echo $counter;?>
        </td>
        <td>
            <?php echo $data[1];?>
        </td>
        <td>
        <a href="index.php?nav=userview&u=<?php echo $data[0];?>">
            <img width=40 height=40 class="img-profile rounded-circle profile-pic" src="<?php echo $data[5];?>">
            by <?php echo $data[4];?>
        </a>
        </td>
        <td>
            <i class="fas fa-calendar"></i> <span class="datefield"><?php echo $data[2];?></span>
        </td>
        <td>
            <?php echo $data[3];?>
        </td>
        <td>
            <span class="score"><?php echo $data[6];?></span> <img width=20 class="aucimg d-none d-md-block" src="images/roc.png" width=28>
        </td>
    </tr>
<?php
    }
?>
    
    </tbody>
</table>
    </div>
</div>


<script src="js/benchhistogram.js"></script>

<script>
    function showhighlight(element){
        window.open("http://localhost:8888/index.php?nav=highlight");
    }
    function highlight(element){
        var rank = element.getElementsByClassName("ranktd")[0].innerHTML.trim();
        $("#rank"+rank).css({ fill: "#45ffca" });
    }
    function rmhighlight(element){
        var rank = element.getElementsByClassName("ranktd")[0].innerHTML.trim();
        $("#rank"+rank).css({ fill: "dodgerblue" });
    }
</script>
