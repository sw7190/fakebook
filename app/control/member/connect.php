	
<?php
  	include("../../server/db.php");
    if(empty($user = $_POST['user'])){
        exit("<script>location.replace('../../../index.php');</script>");
    }
    $sql = "SELECT * FROM user WHERE username='{$user}'";
    $ex1=$db->prepare($sql);
  	$ex2=$ex1->execute();
  	$val=$ex1->fetch();

    if($rs->rowcount()>0){
        $sql = "UPDATE user SET usertime=now() WHERE username='{$user}'";
        $db->query($sql);
    }else{
        $sql = "INSERT INTO user SET username='{$user}', usertime=now()";
        $db->query($sql);
    }
    date_default_timezone_set("Asia/Seoul");
    $now = date('Y-m-d G:i:s',time()-5);
    $sql = "SELECT * FROM user WHERE usertime > '{$now}'";
    $rs = $db->query($sql);
    $list='';
    foreach($rs as $row){
	$name = iconv("EUC-KR","UTF-8",$row['username']);
        $list .= "<li>{$name}</li>";
    }
    $sql = "DELETE FROM user WHERE usertime < '{$now}'";
    $rs = $db->query($sql);
    echo $list;
?>
