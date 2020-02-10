function selectrecipient(text){
    var sp = text.split(",");
    $("#recipient").val(sp[0]);
    $("#recipient_id").val(sp[1]);
    $("#profile").html("<img width=34 height=34 class=\"img-profile rounded-circle\" src=\""+sp[2]+"\">");
    $("#recipient").addClass("pulse");
    setTimeout(function(){
        $("#recipient").removeClass("pulse");
    },800);
}

function approveconnection(text){
    var sp = text.split(",");
    $.ajax({
       type: "POST",
       url: 'dynamic/messaging/approveuser.php',
       data: {connectid: sp[1]},
       success: function(res){
            console.log(res);
            $("#listcontactscontainer").load("dynamic/messaging/listcontacts.php");
       }
    });
}

function addfilter(){
    var text = $("#filtertext").val();
    var mfilter = $("#message_filter_list");
    var newfilter = "<button class=\"btn btn-primary message_filter removebtn\" data-filter=\""+text+"\">"+text+"</button>"
    mfilter.html(mfilter.html()+newfilter);
    
    $('.removebtn').click(function() {
        $(this).remove();
    });
}

function clickremove(){
    $(this).remove();
}

function sendMessage(){
    $("#message_compose").addClass("pulse");
    setTimeout(function(){
        $("#message_compose").removeClass("pulse");
    },800);
    
    var sender = $("#userid").val();
    var rec = $("#recipient").val();
    var recid = $("#recipient_id").val();
    var tit = $("#mtitle").val();
    var mtex = $("#form10").val();
    
    $("#formwarn").remove();
    
    if($("#recipient").val() == "" || $("#mtitle").val() == "" || $("#form10").val() == ""){
        
        var warning_message = "<div class=\"card bg-warning text-white shadow form_warning removebtn\" id=\"formwarn\" role=\"alert\"><nobr><i class=\"fas fa-exclamation-triangle\"></i> Some fields are missing information.</nobr></div>";
        $("#create_message").html($("#create_message").html() + warning_message);
        
        $("#recipient").val(rec);
        $("#recipient_id").val(recid);
        $("#mtitle").val(tit);
        $("#form10").val(mtex);
    }
    else{
        
        $.ajax({
           type: "POST",
           url: 'dynamic/messaging/sendmessage.php',
           data: {userid: sender, recipientid: recid, mtitle: tit, mbody: mtex},
           success: function(res){
                console.log(res);
           }
        });
        
        $("#recipient").val("");
        $("#mtitle").val("");
        $("#form10").val("");
        var warning_message = "<div class=\"card bg-success text-white shadow form_warning removebtn\" id=\"formwarn\" role=\"alert\"><nobr><i class=\"fas fa-paper-plane\"></i> Message sent successfully.</nobr></div>";
        $("#create_message").html($("#create_message").html() + warning_message);
        setTimeout(function(){
            $("#formwarn").fadeOut();
            $("#showmessagecontainer").load("dynamic/messaging/showmessages.php");
        },100);
        
    }
    
    $('.removebtn').click(function() {
        $(this).remove();
    });
}

function filterMessages(){
    
}

function sendrequest(userid){
    var userid = userid.split(",")[1];
    $.ajax({
       type: "POST",
       url: 'dynamic/messaging/sendrequest.php',
       data: {userid: userid},
       success: function(res){
            setTimeout(function(){
                $("#listcontactscontainer").load("dynamic/messaging/listcontacts.php");
            },10);
       }
    });
}

function searchusers(){
    var userstring = $("#usersearch").val();
    
    if(userstring.length > 2){
        
        console.log(userstring);
        $.ajax({
           type: "POST",
           url: 'dynamic/messaging/findcontacts.php',
           data: {usersearch: userstring},
           success: function(res){
                $("#searchresults").html(res);
           }
        });
    }
    else{
        $("#searchresults").html("");
    }
}

