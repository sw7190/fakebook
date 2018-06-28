
<?php
$db=new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8;','root','wjsrnr');

header("Content-Type: text/html; charset=UTF-8");

$rs=$db->prepare("set session character_set_connection=utf8;");
$rs->execute();
$rs=$db->prepare("set session character_set_results=utf8;");
$rs->execute();
$rs=$db->prepare("set session character_set_client=utf8;");
$rs->execute();

session_start();
?>
