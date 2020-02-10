
<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    
    if (strpos(getcwd(), 'api') !== false) {
      require '../dbconfig.php';
    }
    elseif (strpos(getcwd(), 'dynamic') !== false) {
      require 'dbconfig.php';
    }
    else{
      require 'dynamic/dbconfig.php';
    }
    
    if(!isset($_SESSION)){
      session_start();
    }
    
    $userid = $_SESSION["userid"];
    
    if($userid == $_POST["user"]){
        
        if(strlen($_POST["username"]) < 2 || strlen($_POST["firstname"]) < 2 || strlen($_POST["lastname"]) < 2){
            echo "error: required fields invalid";
        }
        else{
            
            $_SESSION["username"] = $_POST["username"];
            
            $username = $_POST["username"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            
            $bio = $_POST["bio"];
            $profession = $_POST["title"];
            $affiliation = $_POST["affiliation"];
            
            $city = $_POST["city"];
            $state = $_POST["state"];
            $country = $_POST["country"];
            
            $twitter = $_POST["twitter"];
            $github = $_POST["github"];
            $linkedin = $_POST["linkedin"];
            $website = $_POST["website"];
            
            
            $sql = "UPDATE user SET username=?, firstname=?, lastname=?, affiliation=?, profession=?, description=?, city=?, state=?, country=?, twitter=?, github=?, linkedin=?, website=? WHERE uid=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssssssssss', $username, $firstname, $lastname, $affiliation, $profession, $bio, $city, $state, $country, $twitter, $github, $linkedin, $website, $userid);
            $stmt->execute();
            
            $stmt->close();
            
        }
    }
    else{
        echo "User not logged in. Can only submit predictions with correct authentication.";
    }
?>