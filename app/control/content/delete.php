<?php
  include("../../server/db.php");


	$id = $_SESSION['id'];
	$idx=isset($_GET['idx']) ? $_GET['idx'] : null;


	$sql="select * from member where id='{$id}'";
	$go=$db->prepare($sql);
  $go->execute();
  $row=$go->fetch();

  if($id != $row['id']){
    exit("<script>alert('아이디가 다름ㅋ');history.back()</script>");
  }

	$sql="delete from board where idx={$idx}";
	$go=$db->query($sql);
?>
<script>
	alert("삭제되었습니다");
	location.href="../../../index.php";
</script>
