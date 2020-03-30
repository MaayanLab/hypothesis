<style>
.description_highlight{
    margin-top: 30px;
    margin-bottom: 30px;
}
.method_icon{
    width: 120px;
}
.submission_info{
    margin-top: 40px;
}
.pred_stat{
    padding-left: 50px;
}
.author_info{
    padding-left: 50px;
}
.rounded-frame{
    border-radius: 10px;
    width: 100%;
    max-width: 140px;
}

.cssanimation, .cssanimation span {
    animation-duration: 0.6s;
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
.datahighlights{
    margin: 15px;
    padding: 30px;
    width: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15) !important;
}

.highdata{
    
    float: left;
    margin-right: 10px;
}
.data_used{
    margin-top: 70px;
}
#cherrieblob{
    margin-top: 0px;
    margin-right: 30px;
    margin-bottom: -20px;
}
#predtable{
    width: 100%;
}
.highlink{
    text-align: center;
    width: 100%;
    margin-top: 50px;
    margin-bottom: -80px;
}
.leftcornericon{
    position: relative;
    top: 70px;
    left: -10px;
    width: 80px;
    height: 80px;
    padding: 15px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15) !important;
    text-align: center;
}
.datahighlights h3{
    margin-left: 50px;
}
</style>

<h1>Prediction Highlight</h1>

<div class="row description_highlight">
<div class="col-8">
<h3>Whole genome mouse phenotype predictions</h3>

This highlight is focused on predicting associations of genes to phenotype. The highlights are showing all significant predcitions for the two genes 
<b>MAST2</b> and <b>CSNK1G2</b>. Both genes are understudied genes from the kinase gene family.
</div>
<div class="col-4 pred_stat">
<b>Prediction Statistics</b><br>
Benchmark Score: <b>8.6</b><br>
#genes: 19021<br>
#predicted phenotypes: 5638<br><br>
<button type="button" class="btn btn-primary highdata d-none d-md-block" onclick="downloadPrediction()"><i class="fas fa-download"></i> Download Prediction</button>
</div>
</div>

<hr>

<div class="row submission_info">
<div class="col-12 col-sm-8">

<div class="row">

<div class="col-3">
    <img src="http://localhost:8888/images/rocket.png" class="method_icon">
</div>

<div class="col-9">
    <h4>Method</h4>
    <b>ARCHS4 co-expression similarity association.</b><br>
    <i class="fas fa-calendar"></i> 11/9/2019 <br>
    <br>
    <div class="text-truncate">
        <nobr><i class="fab fa-github lab"></i> <a href="https://github.com/lachmann12/taggenes"> https://github.com/lachmann12/taggenes </a></nobr>
    </div>
    
    <div class="text-truncate">
        <nobr><i class="fab fa-google lab"></i> <a href="https://colab.research.google.com/drive/1W8_4dq_lyARjo0icVHJDgliHyZdnjViD"> https://colab.research.google.com/drive/1W8_4dq_lyARjo0icVHJDgliHyZdnjViD </a></nobr>
    </div>
</div>

</div>

<div cass="row">
    <div class="method_desc"></div>
</div>

</div>

<div class="author_info col-12 col-sm-4">
    <div class="cssanimation sequence fadeInBottom">
    <img width="160" id="profilepicture" class="img-profile rounded-frame" src="images/slyfox.png">
    <br>
    <a href="http://localhost:8888/index.php?nav=userview&u=d730c2c585e93114700c0ea36e8d248e" target="_blank">Alexander Lachmann</a>
    <div class="date date-pad d-none d-sm-block"><i class="fas fa-calendar"></i> Joined on <span class="datefield2">10/30/2019</span></div>
    </div>
</div>
</div>

<div class="row data_used">
<div class="datahighlights">
<h4>Data used to make predictions</h4>
<button type="button" class="btn btn-primary highdata d-none d-md-block" onclick="addphenotypeprediction()">MGI Mouse Phenotype GMT</button>
<button type="button" class="btn btn-primary highdata d-none d-md-block" onclick="addphenotypeprediction()">ARCHS4 co-expression</button>
<button type="button" class="btn btn-primary highdata d-none d-md-block" onclick="addphenotypeprediction()">Tagger gene co-occurrence</button>

</div>
</div>

<div class="highlink">
<h4>
<a href="">MAST2</a> | <a href="">CSNK1G2</a> | <a href="">High-Confidence IDG</a> | <a href="">High-Confidence Whole-Genome</a>
</h4>
<br>
</div>

<div id="cherrie1" class="row cherries">

<div id="cherrieblob">

<div class="leftcornericon"><img src="images/cherry.png" height=50></div>

<div class="datahighlights">
<div class="cherrieicon"></div>
<h3>MAST2 phenotype predictions</h3><br>
<div id="predtable" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="predtable_length"><label>Show <select name="predtable_length" aria-controls="predtable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="predtable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="predtable"></label></div></div></div><div style="width: 100%;"><div class="col-sm-12"><table id="predtable" class="table table-striped table-bordered compact dataTable no-footer" role="grid" aria-describedby="predtable_info">
<thead>
<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rank: activate to sort column descending" style="width: 37.0104px;">Rank</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Property: activate to sort column ascending" style="width: 202.01px;">Property</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Score: activate to sort column ascending" style="width: 49.0104px;">Score</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Known: activate to sort column ascending" style="width: 46px;">Known</th></tr>
</thead>
<tbody>
<tr role="row" class="odd"><td class="sorting_1">1</td><td>MP:0009046 muscle twitch</td><td>6.5138</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">2</td><td>MP:0011493 double ureter</td><td>4.8776</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">3</td><td>MP:0010399 decreased skeletal muscle glycogen level</td><td>4.3029</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">4</td><td>MP:0003081 abnormal soleus morphology</td><td>4.2928</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">5</td><td>MP:0003061 decreased aerobic running capacity</td><td>4.0186</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">6</td><td>MP:0012514 pectus excavatum</td><td>4.0064</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">7</td><td>MP:0004126 thin hypodermis</td><td>3.9963</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">8</td><td>MP:0000738 impaired muscle contractility</td><td>3.9831</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">9</td><td>MP:0009420 skeletal muscle endomysial fibrosis</td><td>3.9011</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">10</td><td>MP:0006038 increased mitochondrial fission</td><td>3.8370</td><td>0</td></tr></tbody></table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="predtable_info" role="status" aria-live="polite">Showing 1 to 10 of 201 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="predtable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="predtable_previous"><a href="#" aria-controls="predtable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="predtable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button disabled" id="predtable_ellipsis"><a href="#" aria-controls="predtable" data-dt-idx="6" tabindex="0">…</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="7" tabindex="0">21</a></li><li class="paginate_button next" id="predtable_next"><a href="#" aria-controls="predtable" data-dt-idx="8" tabindex="0">Next</a></li></ul></div></div></div></div>
<div class="row"><button id="downloadPred" type="button" class="btn btn-primary" style="height: 35px;">Download <i class="fas fa-file-download"></i></button></div></div>
</div>
</div>

<div id="cherrie2" class="row idg_highlight">

<div id="cherrieblob">

<div class="leftcornericon"><img src="images/cherry.png" height=50></div>

<div class="datahighlights">

<div class="cherrieicon"></div>
<h3>CSNK1G2 phenotype predictions</h3><br>
<div id="predtable" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="predtable_length"><label>Show <select name="predtable_length" aria-controls="predtable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="predtable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="predtable"></label></div></div></div><div style="width: 100%;"><div class="col-sm-12"><table id="predtable" class="table table-striped table-bordered compact dataTable no-footer" role="grid" aria-describedby="predtable_info">
<thead>
<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rank: activate to sort column descending" style="width: 37.0104px;">Rank</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Property: activate to sort column ascending" style="width: 202.01px;">Property</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Score: activate to sort column ascending" style="width: 49.0104px;">Score</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Known: activate to sort column ascending" style="width: 46px;">Known</th></tr>
</thead>
<tbody>
<tr role="row" class="odd"><td class="sorting_1">1</td><td>MP:0009046 muscle twitch</td><td>6.5138</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">2</td><td>MP:0011493 double ureter</td><td>4.8776</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">3</td><td>MP:0010399 decreased skeletal muscle glycogen level</td><td>4.3029</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">4</td><td>MP:0003081 abnormal soleus morphology</td><td>4.2928</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">5</td><td>MP:0003061 decreased aerobic running capacity</td><td>4.0186</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">6</td><td>MP:0012514 pectus excavatum</td><td>4.0064</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">7</td><td>MP:0004126 thin hypodermis</td><td>3.9963</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">8</td><td>MP:0000738 impaired muscle contractility</td><td>3.9831</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">9</td><td>MP:0009420 skeletal muscle endomysial fibrosis</td><td>3.9011</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">10</td><td>MP:0006038 increased mitochondrial fission</td><td>3.8370</td><td>0</td></tr></tbody></table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="predtable_info" role="status" aria-live="polite">Showing 1 to 10 of 201 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="predtable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="predtable_previous"><a href="#" aria-controls="predtable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="predtable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button disabled" id="predtable_ellipsis"><a href="#" aria-controls="predtable" data-dt-idx="6" tabindex="0">…</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="7" tabindex="0">21</a></li><li class="paginate_button next" id="predtable_next"><a href="#" aria-controls="predtable" data-dt-idx="8" tabindex="0">Next</a></li></ul></div></div></div></div>
<div class="row"><button id="downloadPred" type="button" class="btn btn-primary" style="height: 35px;">Download <i class="fas fa-file-download"></i></button></div></div>
</div>

</div>




<div id="highconf" class="row high_confidence">

<div id="cherrieblob">

<div class="leftcornericon"><img src="images/bulb.png" height=60></div>

<div class="datahighlights">
<div class="cherrieicon"></div>
<h3>High confidence phenotype predictions IDG</h3><br>
<div id="predtable" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="predtable_length"><label>Show <select name="predtable_length" aria-controls="predtable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="predtable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="predtable"></label></div></div></div><div style="width: 100%;"><div class="col-sm-12"><table id="predtable" class="table table-striped table-bordered compact dataTable no-footer" role="grid" aria-describedby="predtable_info">
<thead>
<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rank: activate to sort column descending" style="width: 37.0104px;">Rank</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Property: activate to sort column ascending" style="width: 202.01px;">Property</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Score: activate to sort column ascending" style="width: 49.0104px;">Score</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Known: activate to sort column ascending" style="width: 46px;">Known</th></tr>
</thead>
<tbody>
<tr role="row" class="odd"><td class="sorting_1">1</td><td>MP:0009046 muscle twitch</td><td>6.5138</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">2</td><td>MP:0011493 double ureter</td><td>4.8776</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">3</td><td>MP:0010399 decreased skeletal muscle glycogen level</td><td>4.3029</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">4</td><td>MP:0003081 abnormal soleus morphology</td><td>4.2928</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">5</td><td>MP:0003061 decreased aerobic running capacity</td><td>4.0186</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">6</td><td>MP:0012514 pectus excavatum</td><td>4.0064</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">7</td><td>MP:0004126 thin hypodermis</td><td>3.9963</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">8</td><td>MP:0000738 impaired muscle contractility</td><td>3.9831</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">9</td><td>MP:0009420 skeletal muscle endomysial fibrosis</td><td>3.9011</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">10</td><td>MP:0006038 increased mitochondrial fission</td><td>3.8370</td><td>0</td></tr></tbody></table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="predtable_info" role="status" aria-live="polite">Showing 1 to 10 of 201 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="predtable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="predtable_previous"><a href="#" aria-controls="predtable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="predtable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button disabled" id="predtable_ellipsis"><a href="#" aria-controls="predtable" data-dt-idx="6" tabindex="0">…</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="7" tabindex="0">21</a></li><li class="paginate_button next" id="predtable_next"><a href="#" aria-controls="predtable" data-dt-idx="8" tabindex="0">Next</a></li></ul></div></div></div></div>
<div class="row"><button id="downloadPred" type="button" class="btn btn-primary" style="height: 35px;">Download <i class="fas fa-file-download"></i></button></div></div>
</div>

</div>







<div id="highconf" class="row high_confidence">

<div id="cherrieblob">

<div class="leftcornericon"><i class="fas fa-cogs fa-3x" style="margin-left: -5px;"></i></div>

<div class="datahighlights">
<div class="cherrieicon"></div>
<h3>High confidence phenotype predictions</h3><br>
<div id="predtable" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="predtable_length"><label>Show <select name="predtable_length" aria-controls="predtable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="predtable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="predtable"></label></div></div></div><div style="width: 100%;"><div class="col-sm-12"><table id="predtable" class="table table-striped table-bordered compact dataTable no-footer" role="grid" aria-describedby="predtable_info">
<thead>
<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rank: activate to sort column descending" style="width: 37.0104px;">Rank</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Property: activate to sort column ascending" style="width: 202.01px;">Property</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Score: activate to sort column ascending" style="width: 49.0104px;">Score</th><th class="sorting" tabindex="0" aria-controls="predtable" rowspan="1" colspan="1" aria-label="Known: activate to sort column ascending" style="width: 46px;">Known</th></tr>
</thead>
<tbody>
<tr role="row" class="odd"><td class="sorting_1">1</td><td>MP:0009046 muscle twitch</td><td>6.5138</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">2</td><td>MP:0011493 double ureter</td><td>4.8776</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">3</td><td>MP:0010399 decreased skeletal muscle glycogen level</td><td>4.3029</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">4</td><td>MP:0003081 abnormal soleus morphology</td><td>4.2928</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">5</td><td>MP:0003061 decreased aerobic running capacity</td><td>4.0186</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">6</td><td>MP:0012514 pectus excavatum</td><td>4.0064</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">7</td><td>MP:0004126 thin hypodermis</td><td>3.9963</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">8</td><td>MP:0000738 impaired muscle contractility</td><td>3.9831</td><td>0</td></tr><tr role="row" class="odd"><td class="sorting_1">9</td><td>MP:0009420 skeletal muscle endomysial fibrosis</td><td>3.9011</td><td>0</td></tr><tr role="row" class="even"><td class="sorting_1">10</td><td>MP:0006038 increased mitochondrial fission</td><td>3.8370</td><td>0</td></tr></tbody></table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="predtable_info" role="status" aria-live="polite">Showing 1 to 10 of 201 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="predtable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="predtable_previous"><a href="#" aria-controls="predtable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="predtable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button disabled" id="predtable_ellipsis"><a href="#" aria-controls="predtable" data-dt-idx="6" tabindex="0">…</a></li><li class="paginate_button "><a href="#" aria-controls="predtable" data-dt-idx="7" tabindex="0">21</a></li><li class="paginate_button next" id="predtable_next"><a href="#" aria-controls="predtable" data-dt-idx="8" tabindex="0">Next</a></li></ul></div></div></div></div>
<div class="row"><button id="downloadPred" type="button" class="btn btn-primary" style="height: 35px;">Download <i class="fas fa-file-download"></i></button></div></div>
</div>

</div>

