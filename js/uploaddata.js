var userid = "";

function upload(){
  
  var fileData = [];
  var ajaxCallsRemaining = 4;
  
  $("prbar").show();
  
  $.ajax({
     type: "POST",
     url: 'dynamic/api/getsession.php',
     success: function(data){
    
    var username = data.split("|--sep--|")[0];
    var password = data.split("|--sep--|")[1];
    $.getJSON( "https://amp.pharm.mssm.edu/charon/signpolicy?username="+username+"&password="+password, function( data ) {
        
        var items = [];
        
        console.log(data);
        
        $.each( data, function( key, val ) {
          console.log(key+"-"+val);
          if(key == "uid"){
              $('#uid').val(val+"/${filename}");
              userid = val;
          }
          else if(key == "cid"){
              $('#cid').val(val);
          }
          else if(key == "bucket"){
              console.log(val);
              $('#dataform').attr("action", "https://"+val+".s3.amazonaws.com/");
          }
          else if(key == "policy"){
              $('#policy').val(val);
          }
          else if(key == "signature"){
              $('#signature').val(val);
          }
        });
        
        var bar = $('.bar');
        var percent = $('.progress-bar');
        var status = $('#status');
        
        $('#dataform').ajaxForm({
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
                $("#dataform").toggle();
                $("#prbar").toggle();
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
                percent.attr("aria-valuenow", percentComplete);
                percent.css("width", percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
                console.log(xhr.responseText);
            }
        });
        console.log("---"+$('#dataform').html()+"--");
        $('#dataform').submit();
     });
  }
  });
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $("#outputimg").html("<img id=\"imgpreview\" src=\"#\" alt=\"Preview\" class=\"img-fluid preview\"/>");
            $('#imgpreview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function initForm(){
    loggedin = true;
    $('#uploadform').html("");
    
    var form1 = "<form id=\"dataform\" action=\"x\" method=\"POST\" enctype=\"multipart/form-data\" style=\"display: block;\">"+
        "<input id=\"uid\" name=\"key\" value=\"x\" type=\"hidden\">"+
        "<input id=\"cid\" name=\"AWSAccessKeyId\" value=\"x\" type=\"hidden\">"+
        "<input name=\"acl\" value=\"private\" type=\"hidden\">"+
        "<input name=\"success_action_redirect\" value=\"success.html\" type=\"hidden\">"+
        "<input id=\"policy\" name=\"policy\" value=\"x\" type=\"hidden\">"+
        "<input id=\"signature\" name=\"signature\" value=\"x\" type=\"hidden\">"+
        "<input name=\"Content-Type\" value=\"application/octet-stream\" type=\"hidden\">"+
        
        "<input id=\"fileinput\" name=\"file\" type=\"file\" onchange=\"readURL(this);\">"+
        "<br><br>"+
    "</form>";
    
    var progressbar = "<div id=\"prbar\" class=\"progress\" style=\"height: 30px; display: none;\">"+
        "<div class=\"progress-bar\" role=\"progressbar\" style=\"width: 0%;\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\">0%</div>"+
        "</div>";
        
    $('#uploadform').html(form1+progressbar);
}

$( document ).ready(function() {
    initForm();
});



