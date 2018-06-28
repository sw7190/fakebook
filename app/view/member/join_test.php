<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../../../public/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" href="../../../public/css/fake.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>das</title>
</head>

<body>
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4>로그인</h4>
			<form action="../../control/member/login.php" method="post">
				<div class="row">
					<div class="input-field col s12">
						<input id="id" type="text" class="validate" name="id">
						<label for="id">id</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password" type="password" class="validate" name="pw">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="modal-footer center-align">
					<button type ="submit" class="center-align modal-action modal-close waves-effect waves-green btn-flat">로그인</button>
				</div>
			</form>
		</div>

	</div>
	<form action="../../control/member/join.php" method="post">
		이름<input type="text" name="name"><br> 아이디
		<input type="text" name="id"><br> 비밀번호
		<input type="password" name="pw"><br> 비밀번호 확인<input type="password" name="pw_re"><br> 생일
		<input type="date" name="date">
		<button type="submit">회원가입</button>
	</form>
	<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Login</a>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../public/js/materialize.min.js"></script>
<script src="../../../public/js/fake.js"></script>

</html>
