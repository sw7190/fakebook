
<?php
	include("../../server/db.php");
	session_destroy();
?>
<script>
	alert("로그아웃 되었습니다.");
	location.href="../../../index.php";
</script>
