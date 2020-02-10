<style>
    .img-gene{
        max-height: 300px;
        margin-top: 20px;
    }
    .gene-text{
        margin-left: 10px;
        margin-bottom: 60px;
        text-align: justify;
    }
    .gene-info{
        padding: 30px;
        padding-bottom: 50px;
        
    }
    
    @media (max-width:700px) {
        .gene-info{
            padding: 0px;
            padding-bottom: 0px;
            padding-right: 5px;
        }
        .gene-text{
            margin-bottom: 20px;
        }
        .kinase{
            margin-left: 14px;
        }
        .gpcr{
            margin-right: 14px;
        }
        .ionchannel{
            margin-left: 14px;
        }
    }
    .kinase{
        margin-right: -15px;
        margin-left: 24px;
        border-radius: 50%;
        float: right;
        background-image: url("images/tyrosine_kinase.png");
        background-size: 200px 200px;
        width: 200px;
        height: 200px;
        shape-outside: circle();
    }
    .gpcr{
        margin-left: -15px;
        margin-right: 24px;
        border-radius: 50%;
        float: left;
        background-image: url("images/gpcr.png");
        background-size: 200px 200px;
        width: 200px;
        height: 200px;
        shape-outside: circle();
    }
    .ionchannel{
        margin-right: -15px;
        margin-left: 24px;
        border-radius: 50%;
        float: right;
        background-image: url("images/ion_channel.png");
        background-size: 200px 200px;
        width: 200px;
        height: 200px;
        shape-outside: circle();
    }
</style>

<div class="gene-info">

<div class="row sm-nopad">
    <div class="col-md-7 col-12 sm-nopad">
        <p class="plainheader col-12">Protein Kinases</p>
        <div class="gene-text">
            <div class="kinase d-md-none"></div>
            Kinases are part of the larger family of phosphotransferases. The phosphorylation state of a molecule, whether it be a protein, lipid, or carbohydrate, can affect its activity, reactivity, and its ability to bind other molecules. Therefore, kinases are critical in metabolism, cell signalling, protein regulation, cellular transport, secretory processes, and many other cellular pathways, which makes them very important to human physiology.
        </div>
    </div>
    <div class="col-5 text-center d-none d-md-block"><img class="img-gene img-fluid" src="images/tyrosine_kinase.png"></div>
</div>


<div class="row sm-nopad">
    <div class="col-5 text-center d-none d-md-block"><img class="img-gene img-fluid" src="images/gpcr.png"></div>
    <div class="col-md-7 col-12 sm-nopad">
        <p class="plainheader col-12">G-Protein-Coupled Receptors</p>
        <div class="gene-text">
            <div class="gpcr d-md-none"></div>
            G-protein-coupled receptors (GPCRs), also known as seven-(pass)-transmembrane domain receptors, 7TM receptors, heptahelical receptors, serpentine receptor, and G protein–linked receptors (GPLR), constitute a large protein family of receptors that detect molecules outside the cell and activate internal signal transduction pathways and, ultimately, cellular responses. Coupling with G proteins, they are called seven-transmembrane receptors because they pass through the cell membrane seven times.
        </div>
    </div>
</div>

<div class="row sm-nopad">
    <div class="col-md-7 col-12 sm-nopad">
        <p class="plainheader col-12">Ion Channels</p>
        <div class="gene-text">
            <div class="ionchannel d-md-none"></div>
            Ion channels are pore-forming membrane proteins that allow ions to pass through the channel pore. Their functions include establishing a resting membrane potential, shaping action potentials and other electrical signals by gating the flow of ions across the cell membrane, controlling the flow of ions across secretory and epithelial cells, and regulating cell volume. Ion channels are present in the membranes of all excitable cells.
        </div>
    </div>
    <div class="col-5 text-center d-none d-md-block"><img class="img-gene img-fluid" src="images/ion_channel.png"></div>
</div>

</div>