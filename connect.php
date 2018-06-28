<?php
    include("app/server/db.php");



    if(!isset($_POST['name']) || !isset($_POST['id'])){
        exit("<script>location.replace('index.php');</script>");
    }
    else{
        $name = $_POST['name'];
        $id = $_POST['id'];
        $img = $_POST['img'];
    }


    //$user = iconv("UTF-8","EUC-KR",$user);
    $sql = "SELECT * FROM cuser WHERE id='{$id}'";

    $rs=$db->prepare($sql);
	$rs->execute();

    if($rs->rowcount()>0){
        $sql = "UPDATE cuser SET img='{$img}',usertime=now() , name='{$name}' WHERE name='{$name}' AND id='{$id}'";
        $rs=$db->prepare($sql);
    	$rs->execute();
    }else{
        $sql = "INSERT INTO cuser SET id='{$id}', name='{$name}', usertime=now(), img='{$img}'";
        $rs=$db->prepare($sql);
    	$rs->execute();
    }
    date_default_timezone_set("Asia/Seoul");

    $now = date('Y-m-d G:i:s',time()-5);
    $sql = "SELECT * FROM cuser WHERE usertime > '{$now}'";
    $list='';

    $rs=$db->query($sql);

    $img_src='';
    $onclick='';
    $onclick="Materialize.toast('dsadsads',4000)";
    $aboutme2='';
    foreach($rs as $row){
	//$name = iconv("EUC-KR","UTF-8",$row['username']);
    $sql2="SELECT * FROM member WHERE id = '{$row['id']}'";
    $r=$db->prepare($sql2);
    $r->execute();
    $aboutme=$r->fetch();

    if($aboutme['aboutme'] == NULL || $aboutme['aboutme'] == ""){
        $onclick="Materialize.toast('소개없음',4000)";
    }else{

        $onclick="\"Materialize.toast('{$aboutme['aboutme']}',4000)\"";
    }

    if($row['img'] != "" && $row['img'] != 0 || $row['img'] != "0" ){
        $img_src="<img src='public/img/{$row['img']}.jpg' alt='male1' width='30' height='30'>";
    }
    else{
        $img_src="<img src='public/img/male.jpg' alt='male' width='30' height='30'>";
    }

        $list .= "<li style='cursor:pointer' onclick={$onclick}><div class='cname'><div class='cname_text'>{$img_src}<p><span>{$row['name']}</span><i class='material-icons onuser'>fiber_manual_record</i></p></div></div></li>";
    }
    $sql = "DELETE FROM cuser WHERE usertime < '{$now}'";
    $rs=$db->prepare($sql);
    $ex=$rs->execute();

    echo $list;
?>
