
<?php
include("../../server/db.php");


$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$pw = isset($_POST['pw']) ? $_POST['pw'] : NULL;
$pw_re = isset($_POST['pw_re']) ? $_POST['pw_re'] : NULL;
$birth = isset($_POST['birth']) ? $_POST['birth'] : NULL;

if($name == NULL || $id == NULL || $pw == NULL || $pw_re == NULL || $birth == NULL){
exit("<script charset='utf-8'>alert('모두 입력해 주세요.');history.back()</script>");
}
else if($pw != $pw_re){
exit("<script>alert('비밀번호를 같게 입력해 주세요.');history.back()</script>");
}

$name_c=preg_match("/^[\x{ac00}-\x{d7af}~!@#$%^&*]{2,4}$/u",$name);
$id_c=preg_match('/^[a-zA-z][a-zA-z0-9]{5,15}$/i',$id);
$pw_c=preg_match('/^.*(?=.{6,20})(?=.*[0-9])(?=.*[a-zA-Z]).*$/',$pw);
$birth_c=preg_match('/^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[0-1])$/',$birth);

if(!$name_c){
exit("<script>alert('이름은 한글로 2~4 자리로만 가능합니다.');history.back()</script>");
}
if(!$id_c){
exit("<script>alert('아이디는 영문시작 영문 숫자 조합 6~18자리만 가능합니다.');history.back()</script>");
}
if(!$pw_c){
exit("<script>alert('비밀번호는 영문 숫자 조합 6~18자리만 가능합니다.');history.back()</script>");
}
if(!$birth_c){
exit("<script>alert('생년월일을 바르게 입력해 주세요.');history.back()</script>");
}
$sql="select * from member";

$ex1=$db->prepare($sql);
$ex2=$ex1->execute();
$val=$ex1->fetch();

if($id == $val['id']){
exit("<script>alert('이미 존재하는 아이디 입니다.');history.back()</script>");
}

$sql="insert into member set
name='{$name}',
id='{$id}',
pw='{$pw}',
birth='{$birth}'";

$ok=$db->prepare($sql)->execute();
exit("<script>alert('회원가입 완료 되었습니다.');location.href='../../../index.php'</script>");

?>
