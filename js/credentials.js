function login(){
    
    var email = $("#InputEmail").val();
    var password = $("#InputPassword").val();
    
    $.ajax({
       type: "POST",
       url: 'dynamic/credentials/login.php',
       data: {email: email, password: password},
       success: function(res){
          if (res === 'Login success') {
            window.location = 'index.php';
          }
          else {
            console.log("result: " +res);
            $("#formwarn").remove();
            var warning_message = "<div class=\"card bg-warning text-white shadow form_warning removebtn\" id=\"formwarn\" role=\"alert\"><nobr><i class=\"fas fa-exclamation-triangle\"></i> Username or password not matching existing credentials.</nobr></div>";
            $("#create_message").html(warning_message);
          }
       }
    });
}

function createuser(){
    var email = $("#InputEmail").val();
    var password = $("#InputPassword").val();
    var repeatpassword = $("#RepeatPassword").val();
    var first = $("#FirstName").val();
    var last = $("#LastName").val();
    $("#formwarn").remove();
    
    if(password != repeatpassword){
        var warning_message = "<div class=\"card bg-warning text-white shadow form_warning removebtn\" id=\"formwarn\" role=\"alert\"><nobr><i class=\"fas fa-exclamation-triangle\"></i> Passwords are not matching.</nobr></div>";
        $("#create_message").html(warning_message);
    }
    else if((email != "" && password != "") && (first != "" && last != "")){
        $.ajax({
           type: "POST",
           url: 'dynamic/credentials/createuser.php',
           data: {email: email, password: password, lastname: last, firstname: first},
           success: function(res){
              if (res === 'registering success') {
                window.location = 'index.php';
              }
              else if(res === 'duplicate'){
                
                $("#formwarn").remove();
                var warning_message = "<div class=\"card bg-warning text-white shadow form_warning removebtn\" id=\"formwarn\" role=\"alert\"><nobr><i class=\"fas fa-exclamation-triangle\"></i> Email is already in use with another account.</nobr></div>";
                $("#create_message").html(warning_message);
              }
              else{
                console.log(res);
                $("#formwarn").remove();
                var warning_message = "<div class=\"card bg-warning text-white shadow form_warning removebtn\" id=\"formwarn\" role=\"alert\"><nobr><i class=\"fas fa-exclamation-triangle\"></i> There was a problem with registering a new user. Sorry.</nobr></div>";
                $("#create_message").html(warning_message);
              }
           }
        });
    }
    else{
        var warning_message = "<div class=\"card bg-warning text-white shadow form_warning removebtn\" id=\"formwarn\" role=\"alert\"><nobr><i class=\"fas fa-exclamation-triangle\"></i> Missing input fields.</nobr></div>";
        $("#create_message").html(warning_message);
    }
}

function logout(){
    
    $.ajax({
       type: "POST",
       url: 'dynamic/credentials/logout.php',
       data: "",
       success: function(data){
          if (data === 'Logout success') {
            window.location = 'index.php';
          }
       }
    });
}
