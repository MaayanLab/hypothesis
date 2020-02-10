
$( document ).ready(function() {
  $('.s3btn').each(function() {
    $(this).click(function() { upload(this); });
  });
  $('.s3upload').each(function() {
    $(this).change(function() { updateLabel(this); });
  });
});

function updateLabel(input){
  var target = $(input).attr("id");
  if (input.files[0]) {
    $("label[for='"+target+"']").html(input.files[0].name+" | "+humanFileSize(input.files[0].size, true));
  }
}

function upload(b){
  var target = $(b).attr("target");
  $("#"+target).attr("name", "file");
  $("#"+target).before("<input type=\"hidden\" id=\"placeholder_"+target+"\">");
  var ue = $("#ue").val();
  var up = $("#up").val();
  
  if($("#"+target)[0].files[0] !== undefined){
    initFileForm(target, ue, up);
  }
  else{
    console.log("no file selected, will run callback functions");
    evalCallback($(".s3btn[target='"+target+"']").attr("before"));
    evalCallback($(".s3btn[target='"+target+"']").attr("after"));
  }
}

function initFileForm(target, ue, up){
    
    $("#"+target).after("<div id=\"uploadcomponents\"></div>");
    
    var form = "<form id=\"dataform\" action=\"x\" method=\"POST\" enctype=\"multipart/form-data\" style=\"display: block;\">"+
        "<input id=\"uid\" name=\"key\" value=\"x\" type=\"hidden\">"+
        "<input id=\"cid\" name=\"AWSAccessKeyId\" value=\"x\" type=\"hidden\">"+
        "<input name=\"acl\" value=\"private\" type=\"hidden\">"+
        "<input name=\"success_action_redirect\" value=\"success.html\" type=\"hidden\">"+
        "<input id=\"policy\" name=\"policy\" value=\"x\" type=\"hidden\">"+
        "<input id=\"signature\" name=\"signature\" value=\"x\" type=\"hidden\">"+
        "<input name=\"Content-Type\" value=\"application/octet-stream\" type=\"hidden\">"+
        "</form>";
    
    var progressbar = "<div id=\"prbar\" class=\"progress\" style=\"height: 30px;\">"+
        "<div class=\"progress-bar\" role=\"progressbar\" style=\"width: 0%;\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\">0%</div>"+
        "</div>";
    
    $('#uploadcomponents').html(form+progressbar);
    $('#dataform').append($('#'+target));
    
    $(".s3btn[target='"+target+"']").hide();
    
    sendForm(target, ue, up);
}


function sendForm(target, ue, up){
  
  var username = ue;
  var password = up;
  
  $.getJSON( "https://amp.pharm.mssm.edu/charon/signpolicy?username="+username+"&password="+password, function( data ) {
      
      var items = [];
      
      $.each( data, function( key, val ) {
        if(key == "uid"){
            var customFileName = $("#"+target).attr("upload-filename");
            if (typeof customFileName !== typeof undefined && customFileName !== false) {
              $('#dataform #uid').val(val+"/"+customFileName);
            }
            else{
              $('#dataform #uid').val(val+"/${filename}");
            }
            userid = val;
        }
        else if(key == "cid"){
            $('#dataform #cid').val(val);
        }
        else if(key == "bucket"){
            $('#dataform').attr("action", "https://"+val+".s3.amazonaws.com/");
        }
        else if(key == "policy"){
            $('#dataform #policy').val(val);
        }
        else if(key == "signature"){
            $('#dataform #signature').val(val);
        }
      });
      
      var bar = $('.bar');
      var percent = $('.progress-bar');
      
      $('#dataform').ajaxForm({
          beforeSend: function() {
              var percentVal = '0%';
              bar.width(percentVal);
              percent.html(percentVal);
              
              evalCallback($(".s3btn[target='"+target+"']").attr("before"));
          },
          uploadProgress: function(event, position, total, percentComplete) {
              var percentVal = percentComplete + '%';
              bar.width(percentVal);
              percent.html(percentVal);
              percent.attr("aria-valuenow", percentComplete);
              percent.css("width", percentVal);
          },
          complete: function(xhr) {
              //console.log(xhr.responseText);
              resetS3Upload(target);
              evalCallback($(".s3btn[target='"+target+"']").attr("after"));
          }
      });
      
      $('#dataform').submit();
   });
}

function resetS3Upload(target){
    $("#placeholder_"+target).before($("#"+target));
    $("#placeholder_"+target).remove();
    $('#uploadcomponents').fadeOut(200, function() { $(this).remove(); });
    $(".s3btn[target='"+target+"']").delay( 200 ).fadeIn( 200 );
}

function evalCallback(callback){
  var x = eval(callback)
  if (typeof x == 'function') {
      x()
  }
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

function previewImage(input, target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        if(target == null){
          target = "outputimg";
        }
        
        reader.onload = function (e) {
            $("#"+target).html("<img id=\"imgpreview\" src=\"#\" alt=\"Preview\" class=\"img-fluid preview\"/>");
            $('#imgpreview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



