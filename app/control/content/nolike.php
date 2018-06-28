<?php
include("../../server/db.php");

$id = $_SESSION['id'];
$idx = $_POST['idx'];


$sql="update board set cnt = cnt-1 where idx='{$idx}'";

$ex1=$db->prepare($sql);
$ex1->execute();

    $sql="delete from like_board where lidx='{$idx}' and id='{$id}'";

    $ex1=$db->prepare($sql);
    $ex1->execute();
?>
