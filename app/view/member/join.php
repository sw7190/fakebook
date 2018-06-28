<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <link rel="stylesheet" href="../../../public/css/join_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link type="text/css" rel="stylesheet" href="../../../public/css/materialize.min.css" media="screen,projection" />

  	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div id="wrap">
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
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo left">FakeBook</a>
                <ul id="nav-mobile" class="right">
                    <li>이미 FakeBook 회원이신가요?</li>
                    <li><a href="#modal1" class="modal-trigger">로그인</a></li>
                </ul>
            </div>
        </nav>
        <div class="body_form">
            <div class="join_image">
                <img src="../../../public/img/logo_image.png" alt="FakeBook과 함께해요!">
            </div>
            <div class="join_form">
                <div class="row">
                    <form class="col s12" action="../../control/member/join.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="name" type="text" class="validate" placeholder="이름">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="id" type="text" class="validate" placeholder="아이디">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="pw" type="password" class="validate" placeholder="비밀번호">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="pw_re" type="password" class="validate" placeholder="비밀번호 확인">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label>생일</label><br>
                                <input name="birth" type="date" class="validate">
                            </div>
                        </div>

                        <button type="submit" class="btn waves-effect waves-light" id="submit_button">가입하기</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">FakeBook에 오신 걸 환영합니다!</h5>
                        <p class="grey-text text-lighten-4">Welcome to FakeBook!</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2017 Fakebook Corporation All Rights Reserved.
                </div>
            </div>
        </footer>

    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../public/js/materialize.min.js"></script>
<script src="../../../public/js/fake.js"></script>

</html>
