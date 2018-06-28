<?php
    include("../../server/db.php");

        // $rs=$db->prepare("set session character_set_connection=utf8;");
        // $rs->execute();
        // $rs=$db->prepare("set session character_set_results=utf8;");
    	// $rs->execute();
        // $rs=$db->prepare("set session character_set_client=utf8;");
    	// $rs->execute();

    if(!isset($_POST['idx']) || !isset($_POST['final'])){
        exit("<script>location.replace('../../../index.php');</script>");
    }
    else{
        $idx = $_POST['idx'];
        // $name = $_POST['name'];
        // $id = $_POST['id'];
        // $img = $_POST['img'];
        $final = "'".$_POST['final']."'";
    }


    $list='';
    $sql="select * from comment where lidx='{$idx}' AND datetime > {$final} order by datetime desc limit 1";
    $rs=$db->prepare($sql);
    $rs->execute();
    if($rs->rowcount()>0){
        $row = $rs->fetch();
        echo json_encode($row);
        //break;
    }
        usleep(10000);
    // while(1){
    //
    // }




    // if($row['img'] != "" && $row['img'] != 0 || $row['img'] != "0" ){
    //     $img_src="<img src='public/img/{$row['img']}.jpg' alt='male1' width='30' height='30'>";
    // }
    // else{
    //     $img_src="<img src='public/img/male.jpg' alt='male' width='30' height='30'>";
    // }
    //     // $list = "<li><div class='cname'><div class='cname_text'>{$img_src}<p><span>{$row['name']}</span><i class='material-icons onuser'>fiber_manual_record</i></p></div></div></li>";
    //     $list = "<div class='cname'>
    //                 <div class='cname_text'>
    //                     {$img_src}
    //                     <p><span>{$row['name']}</span>{$row['content']}</p>
    //                 </div>
    //             </div>";



?>
