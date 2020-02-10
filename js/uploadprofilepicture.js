
function updateuser(){
  var filename = $('input[type=file]').val().split('\\').pop();
  
  $.ajax({
    type: "POST",
    url: 'dynamic/api/updateprofilepic.php',
    data: {imageurl: "https://biodos.s3.amazonaws.com/"+userid+"/"+filename},
    success: function(res){
        
      var username = $("#uname").val();
      var firstname = $("#fname").val();
      var lastname = $("#lname").val();
      
      var bio = $("#bio").val();
      var title = $('#cpos').val();
      var affiliation = $("#affi").val();
      
      var twitter = $('#twitter').val();
      var github = $('#github').val();
      var linkedin = $('#linkedin').val();
      var website = $('#website').val();
      
      var city = $('#city').val();
      var state = $('#state').val();
      var country = $("#countryselection").children("option:selected").val();
      
      $.ajax({
         type: "POST",
         url: 'dynamic/api/updateuser.php',
         data: {user: $('#cuser').val(), username: username, firstname: firstname, lastname: lastname, bio: bio, title: title, affiliation: affiliation, twitter: twitter, github: github, linkedin: linkedin, website: website, city: city, state: state, country: country},
         success: function(res){
            window.location.href = "index.php?nav=userview&u="+$("#cuser").val();
         }
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

function previewImage(input) {
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
