<?php
    session_start();
    require '../dbconfig.php';
    
    $user_id = $_SESSION["userid"];
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $github = $_POST["github"];
    $colab = $_POST["colab"];
    $description = $_POST["description"];
    $access = $_POST["access"];
    $imgurl = $_POST["imgurl"];
    
    if(isset($_POST["tags"])){
        $tags = $_POST["tags"];
    }
    else{
        $tags = [];
    }
    
    if(isset($_POST["users"])){
        $users = $_POST["users"];
    }
    else{
        $users = [];
    }
    
    if(strlen($title) > 1){
        if($access == "true"){
            $access = 1;
        }
        $sql = "INSERT INTO method (author_id, title, subtitle, description, accessibility, giturl, colaburl, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssisss', $user_id, $title, $subtitle, $description, $access, $github, $colab, $imgurl);
        $stmt->execute();
        $method_id = $conn->insert_id;
        
        foreach ($users as &$user) {
            $sql = "INSERT INTO methodshare (methodid, userid, allowed) VALUES (?, ?, 1)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('is', $method_id, $user);
            $stmt->execute();
        }
        
        foreach ($tags as &$tag) {
            $sql = "INSERT INTO methodtags (methodid, tag, status) VALUES (?, ?, 1)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('is', $method_id, $tag);
            $stmt->execute();
        }
        
        $stmt->close();
    }
    
?>