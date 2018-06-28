<?php
include("../../server/db.php");



$del_sql = "delete from comment where idx = '{$_GET['idx']}' and id = '{$_SESSION['id']}'";
$del_stt=$db->prepare($del_sql);
$del_stt->execute();
echo
    "<script>
    alert('댓글이 삭제되었습니다.');
    location.href='../../../index.php';
    </script>"

?>
