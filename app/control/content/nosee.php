<?php
    include("../../server/db.php");

    if(!isset($_POST['id'])){
        exit("<script>location.replace('../../../index.php');</script>");
    }
    else{
        $id = $_POST['id'];
    }


    $sql="select * from member where id='{$id}'";
    $rs=$db->prepare($sql);
    $rs->execute();
    $row=$rs->fetch();

    $cnt="{$row['nosee']}";

    echo $cnt;
?>
