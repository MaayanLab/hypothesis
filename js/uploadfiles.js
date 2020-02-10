var userid = "";

function uploadDataset(uuid){
  
  var fileData = [];
  var ajaxCallsRemaining = 4;
  
  $("prbar2").show();
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
              //$('#dataform2 #uid').val(val+"/${filename}");
              $('#dataform2 #uid').val(val+"/"+uuid+".obj");
              userid = val;
          }
          else if(key == "cid"){
              $('#dataform2 #cid').val(val);
          }
          else if(key == "bucket"){
              console.log(val);
              $('#dataform2').attr("action", "https://"+val+".s3.amazonaws.com/");
          }
          else if(key == "policy"){
              $('#dataform2 #policy').val(val);
          }
          else if(key == "signature"){
              $('#dataform2 #signature').val(val);
          }
        });
        
        var bar = $('.bar');
        var percent = $('.progress-bar');
        var status = $('#status2');
        
        $('#dataform2').ajaxForm({
            beforeSend: function() {
                console.log($("#dataform2").html());
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
                $("#dataform2").toggle();
                $("#prbar2").toggle();
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
                $("#prbar2").fadeOut();
                console.log(xhr.responseText);
                
                $("#datasetview").load("dynamic/submission/listdatasets.php", function(res) {
                  fixdates();
                  fixfiles();
                  initFileForm();
                });
                //$("#methodview").load("dynamic/submission/listmethods.php");
                clearMethodForm();
            }
        });
        console.log("---"+$('#dataform2').html()+"--");
        $('#dataform2').submit();
     });
  }
  });
}

function readURLFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var fileinfo = "<br><div class=\"col-12\"><div class=\"card file-select bg-info text-white shadow\"><div class=\"card-body center-font\">"+
                      "<i class=\"fas fa-file-upload fa-2x\"></i> <span class=\"centerme\"><b>"+input.files[0].name+"</b> | File size: "+humanFileSize(input.files[0].size, true)+
                      "</span></div></div></div>";
        $("#output2").html(fileinfo);
    }
}

function initFileForm(){
    loggedin = true;
    $('#uploadform2').html("");
    
    var form1 = "<form id=\"dataform2\" action=\"x\" method=\"POST\" enctype=\"multipart/form-data\" style=\"display: block;\">"+
        "<input id=\"uid\" name=\"key\" value=\"x\" type=\"hidden\">"+
        "<input id=\"cid\" name=\"AWSAccessKeyId\" value=\"x\" type=\"hidden\">"+
        "<input name=\"acl\" value=\"private\" type=\"hidden\">"+
        "<input name=\"success_action_redirect\" value=\"success.html\" type=\"hidden\">"+
        "<input id=\"policy\" name=\"policy\" value=\"x\" type=\"hidden\">"+
        "<input id=\"signature\" name=\"signature\" value=\"x\" type=\"hidden\">"+
        "<input name=\"Content-Type\" value=\"application/octet-stream\" type=\"hidden\">"+
        "<div class=\"input-group\"><div class=\"custom-file\">"+
        "<input type=\"file\" name=\"file\" class=\"custom-file-input\" id=\"fileinput\" onchange=\"readURLFile(this);\">"+
        "<label id=\"uploadlabel\" class=\"custom-file-label\" for=\"fileinput\">Choose file</label></div></div>"+
    "</form>";
    
    var progressbar = "<div id=\"prbar2\" class=\"progress\" style=\"height: 30px; display: none;\">"+
        "<div class=\"progress-bar\" role=\"progressbar\" style=\"width: 0%;\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\">0%</div>"+
        "</div>";
        
    $('#uploadform2').html(form1+progressbar);
}


function humanFileSize(bytes, si) {
    var thresh = si ? 1000 : 1024;
    if(Math.abs(bytes) < thresh) {
        return bytes + ' B';
    }
    var units = si
        ? ['kB','MB','GB','TB','PB','EB','ZB','YB']
        : ['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'];
    var u = -1;
    do {
        bytes /= thresh;
        ++u;
    } while(Math.abs(bytes) >= thresh && u < units.length - 1);
    return bytes.toFixed(1)+' '+units[u];
}



$( document ).ready(function() {
    initFileForm();
});



