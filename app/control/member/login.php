
<?php
	include("../../server/db.php");

	$id = isset($_POST['id']) ? $_POST['id'] : NULL;
	$pw = isset($_POST['pw']) ? $_POST['pw'] : NULL;

	if($id == NULL || $pw == NULL){
		exit("<script>alert('모두 입력해 주세요.');history.back()</script>");
	}
	$id_c=preg_match('/^[a-zA-z][a-zA-z0-9]{5,15}$/i',$id);
	$pw_c=preg_match('/^.*(?=.{6,20})(?=.*[0-9])(?=.*[a-zA-Z]).*$/',$pw);

	if(!$id_c){
		exit("<script>alert('아이디는 영문시작 영문 숫자 조합 6~18자리로만 가능합니다.');history.back()</script>");
	}
	if(!$pw_c){
		exit("<script>alert('비밀번호는 영문 숫자 조합 6~20자리로만 가능합니다.');history.back()</script>");
	}
	$sql="select * from member where id='{$id}' AND pw='{$pw}'";

	$ex1=$db->prepare($sql);
	$ex2=$ex1->execute();
	$val=$ex1->fetch();

	if($id == $val['id'] && $pw == $val['pw']){
		$_SESSION['id']=$id;
		$_SESSION['name']=$val['name'];
		$_SESSION['img']=$val['img'];

		exit("<script>alert('로그인 되었습니다.');location.href='../../../index.php'</script>");
	}else{
		exit("<script>alert('아이디 또는 비밀번호가 틀렸습니다.');history.back()</script>");
	}
?>
