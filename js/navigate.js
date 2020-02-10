function navi(path){
    $("#maincontent").html("");
    $("#maincontent").load("dynamic/"+path+".php");
    window.history.pushState('index', 'Title', 'index.php?nav='+path);
    
    if(path == "submissions"){
        initFileForm();
        initForm();
    }
    
    return false;
}


