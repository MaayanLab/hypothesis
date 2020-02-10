function addtag(){
    
    var text = $("#tagtext").val();
    var mfilter = $("#tag_list");
    var newfilter = "<button class=\"btn btn-primary tag_filter removebtn\" data-filter=\""+text+"\">"+text+"</button>"
    mfilter.html(mfilter.html()+newfilter);
    
    $('.removebtn').click(function() {
        $(this).remove();
    });
    
    $("#tagtext").val("");
    
    return false;
}

function uaddtag(){
    
    var text = $("#utagtext").val();
    var mfilter = $("#utag_list");
    var newfilter = "<button class=\"btn btn-primary utag_filter removebtn\" data-filter=\""+text+"\">"+text+"</button>"
    mfilter.html(mfilter.html()+newfilter);
    
    $('.removebtn').click(function() {
        $(this).remove();
    });
    
    $("#tagtext").val("");
    
    return false;
}

function createmethod(){
    var title = $("#title").val();
    var subtitle = $("#subtitle").val();
    var github = $("#github").val();
    var colab = $("#colab").val();
    var public = $('#access2').is(':checked')
    var description = $("#description").val();
    var userid = $('#userid').val();
    
    var tags = [];
    var usershare = [];
    $( ".tag_filter" ).each(function( index ) {
        tags.push($( this ).text());
    });
    
    $( ".usershare" ).each(function( index ) {
        if($(this).is(':checked')){
            usershare.push($( this ).val());
        }
    });
    
    var imgurl = "images/method.png";
    
    if($('#method-img')[0].files[0] !== undefined){
        imgurl = "https://biodos.s3.amazonaws.com/"+userid+"/"+$('#method-img')[0].files[0].name;
    }
    
    $.ajax({
       type: "POST",
       url: 'dynamic/submission/createmethod.php',
       data: {title: title, subtitle: subtitle, github: github, colab: colab, access: public, description: description, tags: tags, users: usershare, imgurl: imgurl},
       success: function(res){
          console.log(res);
          $('#methodModal').modal('toggle');
          $("#methodview").load("dynamic/submission/listmethods.php");
          clearMethodForm();
       }
    });
}

function loadupdatemethod(id){
    
    $.ajax({
       type: "POST",
       url: 'dynamic/submission/updatemethod.php',
       data: {method_id: id},
       success: function(res){
            $("#updateinfo").html(res);
            $('.removebtn').click(function() {
                $(this).remove();
            });
       }
    });
}

function updatemethod(id){

    var title = $("#utitle").val();
    var subtitle = $("#usubtitle").val();
    var github = $("#ugithub").val();
    var colab = $("#ucolab").val();
    var public = $('#uaccess2').is(':checked')
    var description = $("#udescription").val();
    var tags = [];
    var usershare = [];
    $( ".utag_filter" ).each(function( index ) {
        tags.push($( this ).text());
    });
    
    $( ".uusershare" ).each(function( index ) {
        if($(this).is(':checked')){
            usershare.push($( this ).val());
        }
    });
    
    var imgurl = "";
    if($('#method-update-img')[0].files[0] !== undefined){
        imgurl = "https://biodos.s3.amazonaws.com/"+userid+"/"+$('#method-update-img')[0].files[0].name;
    }
    
    $.ajax({
       type: "POST",
       url: 'dynamic/submission/updatemethoddb.php',
       data: {method_id: id, title: title, subtitle: subtitle, github: github, colab: colab, access: public, description: description, tags: tags, users: usershare, imgurl: imgurl},
       success: function(res){
            console.log(res);
            $('#methodUpdateModal').modal('toggle');
            clearMethodUpdateForm();
            $("#methodview").load("dynamic/submission/listmethods.php");
       }
    });
}

function clearMethodForm(){
    $("#title").val("");
    $("#subtitle").val("");
    $("#github").val("");
    $("#colab").val("");
    $('#access1').prop('checked', true);
    $('#access2').prop('checked', false);
    $("#description").val("");
    $("#tag_list").html("");
    $( ".usershare" ).each( function () {
        $(this).prop('checked', false);
    });
    $( "li" ).each( function () {
        $(this).removeClass('active');
    });
}

function clearMethodUpdateForm(){
    $("#utitle").val("");
    $("#usubtitle").val("");
    $("#ugithub").val("");
    $("#ucolab").val("");
    $('#uaccess1').prop('checked', true);
    $('#uaccess2').prop('checked', false);
    $("#udescription").val("");
    $("#utag_list").html("");
    $( ".uusershare" ).each( function () {
        $(this).prop('checked', false);
    });
    $( "li" ).each( function () {
        $(this).removeClass('active');
    });
}

function createdataset(){
    
    if($("#data_up")[0].files[0].size !== undefined){
        var name = $("#dname").val();
        var description = $("#ddescription").val();
        var public = $('#access2').is(':checked');
        var dfile = $('#data_up')[0].files[0].name;
        console.log(dfile);
        var size = $("#data_up")[0].files[0].size;
        var userid = $("#huserid").val();
        
        var uuid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        
        var tags = [];
        var usershare = [];
        $( ".data_tag_filter" ).each(function( index ) {
            tags.push($( this ).text());
        });
        
        $( ".data_usershare" ).each(function( index ) {
            if($(this).is(':checked')){
                usershare.push($( this ).val());
            }
        });
        
        $.ajax({
           type: "POST",
           url: 'dynamic/api/dataset.php',
           data: {name: name, description: description, url: "https://biodos.s3.amazonaws.com/"+userid+"/"+dfile, filename: dfile, user: userid, size: size, dhash: uuid},
           success: function(res){
              $("#datasetview").load("dynamic/submission/listdatasets.php");
           }
        });
    }
    else{
        console.log("no file selected");
    }
}


var hash = document.location.hash;

var prefix = "tab_";
if (hash) {
    $('.nav-tabs a[href="'+hash.replace(prefix,"")+'"]').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});

