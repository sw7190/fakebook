<?php
include("../../server/db.php");

$id = $_POST['id'];
$idx = $_POST['idx'];

$sql="update board set cnt = cnt+1 where idx='{$idx}'";

        $ex1=$db->prepare($sql);
        $ex1->execute();

	$sql="insert into like_board set
        id='{$id}',
		lidx='{$idx}'";

        $ex1=$db->prepare($sql);
        $ex1->execute();

?>
