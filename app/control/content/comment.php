
<?php
    include("../../server/db.php");



	$idx=$_GET['idx'];

	$id=isset($_POST['id']) ? $_POST['id'] : null;
	$name=isset($_SESSION['name']) ? $_SESSION['name'] : null;
	$content=isset($_POST['content']) ? $_POST['content'] : null;
	$img=isset($_POST['img']) ? $_POST['img'] : null;

	if($content == null){
		exit('<script>alert("내용을 입력해 주세요")</script>');
	}
	$content=htmlspecialchars($_POST['content']);

	$sql="insert into comment set
	id='{$id}',
	name='{$name}',
	content='{$content}',
	img='{$img}',
	lidx='{$idx}',
	datetime=now()
	";
	$ex1=$db->prepare($sql);
	$ex2=$ex1->execute();
?>
