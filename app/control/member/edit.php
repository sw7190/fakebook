
<?php
	include("../../server/db.php");



	$id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;

    $sql="select * from member where id='{$id}'";

    $rs=$db->prepare($sql);
    $rs->execute();
    $row=$rs->fetch();

	$name = empty($_POST['name']) ? $row['name'] : $_POST['name'];

	$pw = empty($_POST['pw']) ? $row['pw'] : $_POST['pw'];
  $aboutme = empty($_POST['aboutme']) ? $row['aboutme'] : $_POST['aboutme'];
	$birth = empty($_POST['birth']) ? $row['birth'] : $_POST['birth'];
	$img = empty($_POST['img']) ? $row['img'] : $_POST['img'];

	if($id == NULL){
		exit("<script>alert('로그인 하셈ㅋ.');history.back()</script>");
	}


	$name_c=preg_match("/^[\x{ac00}-\x{d7af}~!@#$%^&*]{2,4}$/u",$name);
	$id_c=preg_match('/^[a-zA-z][a-zA-z0-9]{5,15}$/i',$id);
	$pw_c=preg_match('/^.*(?=.{6,20})(?=.*[0-9])(?=.*[a-zA-Z]).*$/',$pw);
	$date_c=preg_match('/^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[0-1])$/',$birth);

	if(!$name_c){
    exit("<script>alert('이름은 한글로 2~20자리로만 가능합니다.');history.back()</script>");
  	}
	if(!$id_c){
		exit("<script>alert('아이디는 영문시작 영문 숫자 조합 6~18자리로만 가능합니다.');history.back()</script>");
	}
	if(!$pw_c){
		exit("<script>alert('비밀번호는 영문 숫자 조합 6~20자리로만 가능합니다.');history.back()</script>");
	}
	if(!$date_c){
		exit("<script>alert('생년월일을 정확하게 입력해주세요.');history.back()</script>");
	}

    if($_FILES['img']['error']==0){     //제대로 올라가면 0
		$img=$id;
		if(!getimagesize($_FILES['img']['tmp_name'])){    //제대로 안되면 false 인데 ! 을 써서 true 만들어서 if문 실행
			exit("
			<script>
			alert('사진 안올라감');
			history.back();
			</script>");
		}

		if(!rename($_FILES['img']['tmp_name'],"../../../public/img/{$id}.jpg")){//제대로 안되면 false 인데 ! 을 써서 true 만들어서 if문 실행
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



	$sql="update member set
		name='{$name}',
		pw='{$pw}',
		birth='{$birth}',
    img='{$img}',
    aboutme='{$aboutme}'
    where id='{$id}'" ;

    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['img']=$img;

	$ok=$db->prepare($sql)->execute();

	$sql="update board set
		name='{$name}'
    where id='{$id}'";
		$ok=$db->prepare($sql)->execute();

	exit("<script>alert('수정이 완료 되었습니다.');location.href='../../../index.php'</script>");

?>
