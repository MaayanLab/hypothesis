
function updateuser(){
  var filename = $('input[type=file]').val().split('\\').pop();
  var userid = $("#cuser").val();
  
  if(filename.length > 3){
    $.ajax({
      type: "POST",
      url: 'dynamic/api/updateprofilepic.php',
      data: {imageurl: "https://biodos.s3.amazonaws.com/"+userid+"/"+filename},
      success: function(res){
        updateuserinfo();
      }
    });
  }
  else{
    updateuserinfo();
  }
}

function updateuserinfo(){
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