
<?php
    include("../../server/db.php");



    $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$name = isset($_SESSION['name']) ? $_SESSION['name'] : null;
	$content = isset($_POST['content']) ? $_POST['content'] : null;
	$time = null;


	if($content == null || $name == null || $id == null ){
		exit("<script>alert('모두 입력해 주세요.');history.back()</script>");
	}
    $content=htmlspecialchars($_POST['content']);
	if($_FILES['img']['error']==0){     //제대로 올라가면 0
		$time=microtime();
		if(!getimagesize($_FILES['img']['tmp_name'])){    //제대로 안되면 false 인데 ! 을 써서 true 만들어서 if문 실행
			exit("
			<script>
			alert('사진 안올라감');
			history.back();
			</script>");
		}

		if(!rename($_FILES['img']['tmp_name'],"../../../public/img/{$time}.jpg")){//제대로 안되면 false 인데 ! 을 써서 true 만들어서 if문 실행
			exit("
			<script>
			alert('사진 안올라감');
			history.back();
			</script>");
		};
	}
	else if($_FILES['img']['error']!=4){ //이미지가 안올라가면 에러 코드
			exit("
			<script>
			alert('사진 안올라감');
			history.back();
			</script>");
	}
        $sql="UPDATE member SET nosee = nosee+1 WHERE id != '{$_SESSION['id']}'";
        $ex1=$db->prepare($sql);
        $ex1->execute();

		$sql="insert into board set
        id='{$id}',
		name='{$name}',
		content='{$content}',
		date=now(),
		img='{$time}'";


        $ex1=$db->prepare($sql);
        $ex2=$ex1->execute();

	    exit('<script>alert("등록 되었습니다.");location.href="../../../index.php";</script>');


?>
