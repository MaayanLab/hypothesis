<style>
    .follower{
        text-align: center;
        min-width: 120px;
        float: left;
        font-size: 14px;
        margin-right: 16px;
    }
    .followrow{
        margin-bottom: 20px;
    }
</style>


<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    if (strpos(getcwd(), 'user') !== false) {
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
    
?>
<br><br>
<h5>Following</h5><br>
<div class="row followrow">

<?php
    
    $sql="SELECT follow.follow, user.username, user.profilepic FROM follow INNER JOIN user ON follow.follow=user.uid WHERE follow.userid=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userprofile);
    $stmt->execute();
    $stmt->bind_result($data[0], $data[1], $data[2]);
    
    while ($stmt->fetch()) {
?>
    
      <div class="follower">
        <a href="index.php?nav=userview&u=<?php echo $data[0];?>">
            <img width=40 height=40 class="img-profile rounded-circle" src="<?php echo $data[2];?>"><br>
            <nobr><?php echo $data[1];?></nobr>
        </a>
      </div>
      


<?php
    }
?>

</div>







