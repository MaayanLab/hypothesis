<?php
    session_start();
    require '../dbconfig.php';
    
    $user_id = $_SESSION["userid"];
    
    $method_id = $_POST["method_id"];
    
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
        
        if($imgurl == ""){
            $sql = "UPDATE method SET author_id=?, title=?, subtitle=?, description=?, accessibility=?, giturl=?, colaburl=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssissi', $user_id, $title, $subtitle, $description, $access, $github, $colab, $method_id);
            $stmt->execute();
        }
        else{
            $sql = "UPDATE method SET author_id=?, title=?, subtitle=?, description=?, accessibility=?, giturl=?, colaburl=?, image=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssisssi', $user_id, $title, $subtitle, $description, $access, $github, $colab, $imgurl, $method_id);
            $stmt->execute();
        }
        
        $sql = "UPDATE methodshare SET allowed=0 WHERE methodid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $method_id);
        $stmt->execute();
        
        foreach ($users as &$user) {
            $sql = "INSERT INTO methodshare (methodid, userid, allowed) VALUES (?, ?, 1)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('is', $method_id, $user);
            $stmt->execute();
        }
        
        $sql = "UPDATE methodtags SET status=0 WHERE methodid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $method_id);
        $stmt->execute();
        
        foreach ($tags as &$tag) {
            $sql = "INSERT INTO methodtags (methodid, tag, status) VALUES (?, ?, 1)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('is', $method_id, $tag);
            $stmt->execute();
        }
        
        $stmt->close();
    }
    
?>